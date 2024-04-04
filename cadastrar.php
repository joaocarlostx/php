<?php 
require_once("conexao.php");
$tabela = 'empresas';
$data_hoje = date('Y-m-d');
$email = $_POST['email'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];
$modalidade = $_POST['modalidade'];
$query = $pdo->query("SELECT * FROM config WHERE empresa = 0");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$teste_config = $res[0]['teste'];
$dias_teste = $res[0]['dias_teste'];
if($dias_teste == ""){
	$dias_teste = 3;
}
$senha_crip = md5($senha);
$data_pgto = date('Y-m-d', strtotime("+$dias_teste days",strtotime($data_hoje))); 
//validar nome
$query = $pdo->query("SELECT * from $tabela where email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0){
	echo 'Email já Cadastrado, escolha outro!!';
	exit();
}
$query = $pdo->prepare("INSERT into empresas SET nome = :nome, email = :email, telefone = :telefone, modalidade = :modalidade, ativo = 'Sim', data_cad = curDate(), data_pgto = '$data_pgto', teste = 'Sim' ");
$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":modalidade", "$modalidade");
$query->execute();
$id_empresa = $pdo->lastInsertId();
if($id_empresa != "" and $id_empresa != 0){
$query = $pdo->prepare("INSERT into usuarios SET empresa = '$id_empresa', nome = :nome, email = :email, telefone = :telefone, senha = '$senha', senha_crip = '$senha_crip', ativo = 'Sim', foto = 'sem-foto.jpg', nivel = 'Administrador', data = curDate() ");
}else{
    echo 'Não foi Possível Efetuar o Cadastro, entre em contato com o administrador do sistema!!';
    exit();
}
$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":telefone", "$telefone");
$query->execute();
echo 'Salvo com Sucesso';
?>