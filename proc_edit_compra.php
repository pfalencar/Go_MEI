<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$descricaocompra = filter_input(INPUT_POST, 'descricaocompra', FILTER_SANITIZE_STRING);
$dtcompra = filter_input(INPUT_POST, 'dtcompra', FILTER_SANITIZE_STRING);
$valorcompra = filter_input(INPUT_POST, 'valorcompra', FILTER_SANITIZE_STRING);


//echo "id: $id <br>";
//echo "descricao compra: $descricaocompra <br>";
//echo "dtcompra: $dtcompra <br>";
//echo "valorcompra: $valorcompra <br>";

$result_compra = "UPDATE compra SET descricaocompra='$descricaocompra', dtcompra='$dtcompra', valorcompra='$valorcompra' WHERE id_compra = '$id'";

$resultado_compra = mysqli_query($conexao, $result_compra);

if (mysqli_affected_rows($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Compra editada com sucesso</p>";
	header("Location:edit_compra.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Compra não foi editada com sucesso</p>";
	header("Location:edit_compra.php?id=");
}

?>