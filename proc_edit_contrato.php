<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$idmei = filter_input(INPUT_POST, 'idmei', FILTER_SANITIZE_NUMBER_INT);
$idfuncionario = filter_input(INPUT_POST, 'idfuncionario', FILTER_SANITIZE_NUMBER_INT);
$iniciocontrato = filter_input(INPUT_POST, 'iniciocontrato', FILTER_SANITIZE_STRING);
$fimcontrato = filter_input(INPUT_POST, 'fimcontrato', FILTER_SANITIZE_STRING);
$horarioservico = filter_input(INPUT_POST, 'horarioservico', FILTER_SANITIZE_STRING);
$valorhora = filter_input(INPUT_POST, 'valorhora', FILTER_SANITIZE_STRING);
$dtpagamento = filter_input(INPUT_POST, 'dtpagamento', FILTER_SANITIZE_STRING);
$valorpagamento = filter_input(INPUT_POST, 'valorpagamento', FILTER_SANITIZE_STRING);

/*
echo "id: $id <br>";
echo "idmei: $idmei <br>";
echo "idfuncionario: $idfuncionario <br>";
echo "início do contrato: $iniciocontrato <br>";
echo "fim contrato: $fimcontrato <br>";
echo "horario servico: $horarioservico <br>";
echo "valor/hora: $valorhora <br>";
echo "dt de pagamento: $dtpagamento <br>";
echo "valor de pagamento: $valorpagamento <br>";
*/


$result_contrato = "UPDATE contrato SET iniciocontrato='$iniciocontrato', fimcontrato='$fimcontrato', horarioservico='$horarioservico', valorhora='$valorhora', dtpagamento='$dtpagamento', valorpagamento='$valorpagamento' WHERE id_contrato = '$id'";

$resultado_contrato = mysqli_query($conexao, $result_contrato);

if (mysqli_affected_rows($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Contrato editado com sucesso!</p>";
	header("Location:edit_contrato.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Contrato não foi editado com sucesso.</p>";
	header("Location:edit_contrato.php?id=");
}


?>