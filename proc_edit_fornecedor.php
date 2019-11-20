<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$razaosocial = filter_input(INPUT_POST, 'razaosocial', FILTER_SANITIZE_STRING);
$inscricaoestadual = filter_input(INPUT_POST, 'inscricaoestadual', FILTER_SANITIZE_STRING);
$inscricaomunicipal = filter_input(INPUT_POST, 'inscricaomunicipal', FILTER_SANITIZE_STRING);

//echo "id: $id <br>";
//echo "Razao Social: $razaosocial <br>";
//echo "IE: $inscricaoestadual <br>";
//echo "IM: $inscricaomunicipal <br>";

$result_fornecedor = "UPDATE fornecedor SET razaosocial='$razaosocial', inscricaoestadual='$inscricaoestadual', inscricaomunicipal='$inscricaomunicipal' WHERE id_fornecedor = '$id'";

$resultado_usuario = mysqli_query($conexao, $result_fornecedor);

if (mysqli_affected_rows($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Fornecedor editado com sucesso</p>";
	header("Location:PesquisaFornecedor.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Fornecedor não foi editado com sucesso</p>";
	header("Location:edit_fornecedor.php?id=");
}

?>