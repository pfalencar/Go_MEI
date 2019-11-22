<?php
session_start();
include_once("Conexao.php");

$descricaocompra = filter_input(INPUT_POST, 'descricaocompra', FILTER_SANITIZE_STRING);
$valorcompra = filter_input(INPUT_POST, 'valorcompra', FILTER_SANITIZE_STRING);

/*
echo "descricaocompra: $descricaocompra <br>";
echo "dtcompra: $dtcompra <br>";
echo "valorcompra: $valorcompra <br>";
*/

$result_compra = "INSERT INTO compra (descricaocompra, dtcompra, valorcompra) VALUES ('$descricaocompra', NOW(), '$valorcompra')";

$resultado_compra = mysqli_query($conexao, $result_compra);

if (mysqli_insert_id($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Compra cadastrada com sucesso</p>";
	header("Location:CadCompra.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Compra não foi cadastrada com sucesso</p>";
	header("Location:CadCompra.php");
}


?>