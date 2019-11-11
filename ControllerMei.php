<?php
session_start();
include('conexao.php');

if( empty($_POST['razaosocial']) || empty($_POST['cnpj']) || empty($_POST['ocupacaoprincipal']) ) {
  header('Location: ViewMei.php');
  exit();
}

$razaosocial = mysqli_real_escape_string($conexao, $_POST['razaosocial']);
$cnpj = mysqli_real_escape_string($conexao, $_POST['cnpj']);
$ocupacaoprincipal = mysqli_real_escape_string($conexao, $_POST['ocupacaoprincipal']);

$sql = "select count(*) as total from mei where cnpj = '$cnpj'";

//$query = "insert into mei (razaosocial, cnpj, ocupacaoprincipal, data_cadastro) values ('{$razaosocial}','{$cnpj}','{$ocupacaoprincipal}', NOW())";

$result = mysqli_query($conexao, $sql);
$row = mysqli_num_rows($result);

if ($row['total'] == 1){
	
	$_SESSION['usuario_existe'] = true;
	header('Location: ViewMei.php');
	exit();

} elseif ($row['total'] == 0) {
	$sql = "insert into mei (razaosocial, cnpj, ocupacaoprincipal) values ('{$razaosocial}','{$cnpj}','{$ocupacaoprincipal}')";
	if ($conexao->query($sql) == TRUE) {
		$_SESSION['status_cadastro'] = true;
		header('Location: ViewMei.php');
		exit();	
	}
} else{
	die();
}

$conexao->close();

?>


