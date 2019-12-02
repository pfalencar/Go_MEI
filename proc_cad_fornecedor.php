<?php
session_start();
include_once("Conexao.php");

$id_usuario = $_SESSION['id_usuario'];
$razaosocial = filter_input(INPUT_POST, 'razaosocial', FILTER_SANITIZE_STRING);
$inscricaoestadual = filter_input(INPUT_POST, 'inscricaoestadual', FILTER_SANITIZE_STRING);
$inscricaomunicipal = filter_input(INPUT_POST, 'inscricaomunicipal', FILTER_SANITIZE_STRING);

echo "razaosocial: $razaosocial <br>";
echo "inscricaoestadual: $inscricaoestadual <br>";
echo "inscricaomunicipal: $inscricaomunicipal <br>";

$result_fornecedor = "INSERT INTO fornecedor (id_usuario, razaosocial, inscricaoestadual, inscricaomunicipal, dt) VALUES ('$id_usuario','$razaosocial', '$inscricaoestadual', '$inscricaomunicipal',NOW())";

$resultado_fornecedor = mysqli_query($conexao, $result_fornecedor);

if (mysqli_insert_id($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Fornecedor cadastrado com sucesso</p>";
	header("Location:CadFornecedor.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Fornecedor não foi cadastrado com sucesso</p>";
	header("Location:CadFornecedor.php");
}


?>