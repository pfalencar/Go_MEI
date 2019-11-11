<?php
session_start();
include('conexao.php');

if( empty($_POST['nome']) || empty($_POST['cpf']) || empty($_POST['sexo']) || empty($_POST['cep']) || empty($_POST['uf']) ) {
	$_SESSION['campo_vazio'] = true;
  header('Location: ViewCliente.php');
  exit();
}

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
$sexo = mysqli_real_escape_string($conexao, $_POST['sexo']);
$cep = mysqli_real_escape_string($conexao, $_POST['cep']);
$ufs = mysqli_real_escape_string($conexao, $_POST['uf']);


$sql = "select count(*) as total from cliente where cpf = '$cpf'";

$result = mysqli_query($conexao, $sql);
$row = mysqli_num_rows($result);


if ($row['total'] == 1){
	
	$_SESSION['cliente_existe'] = true;
	header('Location: ViewCliente.php');
	exit();

} elseif ($row['total'] == 0) {

	$sql = "insert into cliente (nome, cpf, genero, cep, uf) values ('$nome','$cpf','$sexo','$cep','$uf')";

	if ($conexao->query($sql) == TRUE) {
		$_SESSION['status_cadastro'] = true;
		header('Location: ViewCliente.php');
		exit();	
	}
} else{
	die();
}

$conexao->close();

?>