<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);

//echo "id: $id <br>";
//echo "nome: $nome <br>";
//echo "cpf: $cpf <br>";
//echo "sexo: $sexo <br>";
//echo "cep: $cep <br>";
//echo "uf: $uf <br>";

$result_cliente = "UPDATE cliente SET nome='$nome', cpf='$cpf', genero='$sexo', cep='$cep', uf='$uf' WHERE id_cliente = '$id'";

$resultado_cliente = mysqli_query($conexao, $result_cliente);

if (mysqli_affected_rows($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Cliente editado com sucesso</p>";
	header("Location:edit_cliente.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Cliente não foi editado com sucesso</p>";
	header("Location:edit_cliente.php?id=");
}

?>