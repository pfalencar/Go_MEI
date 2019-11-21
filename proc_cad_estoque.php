<?php
session_start();
include_once("Conexao.php");

$descricaoEstoque = filter_input(INPUT_POST, 'descricaoEstoque', FILTER_SANITIZE_STRING);
$preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_STRING);

/*
echo "descricao Estoque: $descricaoEstoque <br>";
echo "preco: $preco <br>";
echo "quantidade: $quantidade <br>";

*/


$result_estoque = "INSERT INTO estoque (descricaoEstoque, preco, quantidade) VALUES ('$descricaoEstoque', '$preco', '$quantidade')";

$resultado_estoque = mysqli_query($conexao, $result_estoque);

if (mysqli_insert_id($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Estoque cadastrado com sucesso</p>";
	header("Location:CadEstoque.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Estoque não foi cadastrado com sucesso</p>";
	header("Location:CadEstoque.php");
}


?>