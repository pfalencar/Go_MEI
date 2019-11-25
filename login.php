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

$query = "SELECT id_mei, nome FROM mei WHERE email = '{$email}' AND senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1){
	$resposta_bd = mysqli_fetch_assoc($result);
	$_SESSION['id_mei'] = $resposta_bd['id_mei'];
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