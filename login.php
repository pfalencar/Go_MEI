<?php
session_start();
include('conexao.php');

if( empty($_POST['email']) || empty($_POST['senha']) ) {
  header('Location: index.php');
  echo "E-mail ou senha vazios!";
  exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select nome from usuario where email = '{$email}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1){
	$resposta_bd = mysqli_fetch_assoc($result);
	$_SESSION['nome'] = $resposta_bd['nome'];
	header('Location: painel.php');
	exit();

} elseif ($row == 0){
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();	

} else {
	die();
}
	



?>