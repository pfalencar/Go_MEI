<?php
session_start();
include_once("Conexao.php");

$descricaoServico = filter_input(INPUT_POST, 'descricaoServico', FILTER_SANITIZE_STRING);
$precoServico = filter_input(INPUT_POST, 'precoServico', FILTER_SANITIZE_STRING);
$quantidadeServico = filter_input(INPUT_POST, 'quantidadeServico', FILTER_SANITIZE_STRING);

/*
echo "descricaoServico: $descricaoServico <br>";
echo "precoServico: $precoServico <br>";
echo "quantidade: $quantidadeServico <br>";
*/


$result_servico = "INSERT INTO servico (descricaoservico, precoservico, quantidadeservico) VALUES ('$descricaoServico', '$precoServico', '$quantidadeServico')";

$resultado_servico = mysqli_query($conexao, $result_servico);

if (mysqli_insert_id($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Servico cadastrado com sucesso</p>";
	header("Location:CadServico.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Servico não foi cadastrado com sucesso</p>";
	header("Location:CadServico.php");
}


?>