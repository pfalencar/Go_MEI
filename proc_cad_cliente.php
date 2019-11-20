<?php
session_start();
include_once("Conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);

/*
echo "nome: $nome <br>";
echo "cpf: $cpf <br>";
echo "sexo: $sexo <br>";
echo "cep: $cep <br>";
echo "uf: $uf <br>";
*/


$result_cliente = "INSERT INTO cliente (nome, cpf, genero, cep, uf) VALUES ('$nome', '$cpf', '$sexo', '$cep', '$uf')";

$resultado_cliente = mysqli_query($conexao, $result_cliente);

if (mysqli_insert_id($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Cliente cadastrado com sucesso</p>";
	header("Location:CadCliente.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Cliente não foi cadastrado com sucesso</p>";
	header("Location:CadCliente.php");
}


?>