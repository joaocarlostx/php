<?php 

@session_start();

require_once("conexao.php");


$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$senha_crip = md5($senha);



$query = $pdo->prepare("SELECT * FROM usuarios WHERE (email = :usu or cpf = :usu) and senha_crip = :senha");
$query->bindValue(":usu", "$usuario");
$query->bindValue(":senha", "$senha_crip");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg > 0){
    if($res[0]['ativo'] != 'Sim'){
        echo '<script>alert("Usuário Inativo, contate o Administrador!")</script>';
        echo '<script>window.location="index.php"</script>';

        exit();
    }
}


    $id = @$res[0]['id'];
    $nivel = @$res[0]['nivel'];
    $empresa = @$res[0]['empresa'];
    $id_usuario = $id;

    if($nivel != 'SAS' and $nivel != 'Administrador'){
    $query = $pdo->query("SELECT * FROM usuarios_permissoes where usuario = '$id_usuario' ");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg = @count($res);
             if($total_reg == 0){ 

                 echo '<script>alert("Login não encontrado, contate o Administrador!")</script>';
                 echo '<script>window.location="index.php"</script>';
            }
    }

    //armazenar no storage o id e o nivel e o id_empresa
    echo "<script>localStorage.setItem('id_usu', '$id')</script>";
    echo "<script>localStorage.setItem('nivel_usu', '$nivel')</script>";
    echo "<script>localStorage.setItem('id_empresa', '$empresa')</script>";
    //$id_teste = "<script>document.write(localStorage.id_usu)</script>";


    @$_SESSION['id_empresa'] = $empresa;
    @$_SESSION['id_usuario'] = $id;
    @$_SESSION['nivel'] = $nivel;


    $query = $pdo->query("SELECT * FROM empresas where id = '$empresa'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg = @count($res);
    $modalidade = @$res[0]['modalidade'];


   if(($nivel == 'Administrador' or $nivel == 'Usuario' or $nivel == 'SAS') and $empresa == '0'){


     @$_SESSION['id_usuario'] = $id;
     @$id_usua = $id;

        $hoje = date('d/m/Y H:i');
        $query3 = $pdo->prepare("INSERT INTO logs_usuarios SET empresa = '0', usuario = '$id_usua', data_lanc = '$hoje', alteracao = 'Login de Usuário'");
        $query3->execute();
        echo '<script>window.location="sas"</script>';

    }

    if(($nivel == 'Administrador' or $nivel == 'Usuario' or $nivel == 'SAS') and $empresa != '0' and $modalidade == 'atacado'){

        //verifica se empresa tem contas vencidas

        $query2 = $pdo->query("SELECT * FROM receber where data_venc < curDate() and pago != 'Sim' and tipo = 'Empresa' and empresa = '0' and pessoa = '$empresa' order by data_venc asc");
        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
        $total_reg2 = @count($res2);
        if($total_reg2 > 0){

            $query = $pdo->query("SELECT * FROM config WHERE empresa = '0'"); //consulta os usuarios nivel SAS
            $res = $query->fetchAll(PDO::FETCH_ASSOC); //guarda resultado de consulta 
            $total_reg = @count($res); //traz o total de resultados da consulta 

            $dias_bloqueio = $res[0]['dias_bloqueio'];
            $msg_bloqueio = $res[0]['msg_bloqueio'];

            echo '<script>alert("'.$msg_bloqueio.'")</script>';
       }

        echo '<script>window.location="sistema"</script>';
         
    }

    if(($nivel == 'Administrador' or $nivel == 'Usuario' or $nivel == 'SAS') and $empresa != '0' and $modalidade == 'varejo'){

        //verifica se empresa tem contas vencidas

        $query2 = $pdo->query("SELECT * FROM receber where data_venc < curDate() and pago != 'Sim' and tipo = 'Empresa' and empresa = '0' and pessoa = '$empresa' order by data_venc asc");
        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
        $total_reg2 = @count($res2);
        if($total_reg2 > 0){

            $query = $pdo->query("SELECT * FROM config WHERE empresa = '0'"); //consulta os usuarios nivel SAS
            $res = $query->fetchAll(PDO::FETCH_ASSOC); //guarda resultado de consulta 
            $total_reg = @count($res); //traz o total de resultados da consulta 

            $dias_bloqueio = $res[0]['dias_bloqueio'];
            $msg_bloqueio = $res[0]['msg_bloqueio'];

            echo '<script>alert("'.$msg_bloqueio.'")</script>';
       }

        echo '<script>window.location="varejo"</script>';
         
    }

    if(($nivel == 'Administrador' or $nivel == 'Usuario') and $empresa != '0' and $modalidade === 'treinamentos'){

        //verifica se empresa tem contas vencidas

        $query2 = $pdo->query("SELECT * FROM receber where data_venc < curDate() and pago != 'Sim' and tipo = 'Empresa' and empresa != '0' and pessoa = '$empresa' order by data_venc asc");
        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
        $total_reg2 = @count($res2);
        if($total_reg2 > 0){

            $query = $pdo->query("SELECT * FROM config WHERE empresa = '0'"); //consulta os usuarios nivel SAS
            $res = $query->fetchAll(PDO::FETCH_ASSOC); //guarda resultado de consulta 
            $total_reg = @count($res); //traz o total de resultados da consulta 

            $dias_bloqueio = $res[0]['dias_bloqueio'];
            $msg_bloqueio = $res[0]['msg_bloqueio'];

            echo '<script>alert("'.$msg_bloqueio.'")</script>';
       }

        echo '<script>window.location="treinamentos"</script>';
         
    }else{

    echo '<script>alert("Dados Incorretos!")</script>';

    echo '<script>window.location="index.php"</script>';

    exit();

    }      
   
?>
