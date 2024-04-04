<?php 
$banco = 'roifut7';
$usuario = 'root';
$senha = '';
$servidor = 'localhost';


//busca a conexao url automaticamente
$url_sistema = "http://$_SERVER[HTTP_HOST]/";
$url = explode("//", $url_sistema);
if($url[1] == 'localhost/'){
	$url_sistema = "http://$_SERVER[HTTP_HOST]/roifut7/";
}

date_default_timezone_set('America/Sao_Paulo');

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
} catch (Exception $e) {
	echo 'Erro nos dados de conexão com o banco!<br>'.$e;
}

?>