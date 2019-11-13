<?php
session_start();
include('conexao.php');

//salvar
if ($_POST['salvar']) {
	if( empty($_POST['razaosocial']) || empty($_POST['inscricaoestadual']) || empty($_POST['inscricaomunicipal']) ) {
		$_SESSION['campo_vazio'] = true;
	  header('Location: ViewFornecedor.php');
	  exit();
	} 
		

	$razaosocial = mysqli_real_escape_string($conexao, $_POST['razaosocial']);
	$inscricaoestadual = mysqli_real_escape_string($conexao, $_POST['inscricaoestadual']);
	$inscricaomunicipal = mysqli_real_escape_string($conexao, $_POST['inscricaomunicipal']);

	$sql = "select count(*) as total from mei where razaosocial = '$razaosocial'";

	$result = mysqli_query($conexao, $sql);
	$row = mysqli_num_rows($result);

	if ($row['total'] == 1){
		
		$_SESSION['fornecedor_existe'] = true;
		header('Location: ViewFornecedor.php');
		exit();

	} elseif ($row['total'] == 0) {
		$sql = "insert into fornecedor (razaosocial, inscricaoestadual, inscricaomunicipal) values ('$razaosocial','$inscricaoestadual','$inscricaomunicipal')";
		if ($conexao->query($sql) == TRUE) {
			$_SESSION['status_cadastro'] = true;
			header('Location: ViewFornecedor.php');
			exit();	
		}
	} else{
		die();
	}
}

//selecionar
if ($_POST['pesquisar']) {
	$resultado = mysql_query("SELECT * FROM tb_teste");

	while ($linha = mysql_fetch_array($resultado)){
		$idbanco = $linha['id'] . '<br>';
		$nomebanco = $linha['nome'] . '<br>';
		$emailbanco = $linha['email'] . '<br>';
		$assuntobanco = $linha['assunto'] . '<br>';
		$mensagembanco = $linha['mensagem'] . '<br><br>';
	}
	header('Location: ViewPesquisaFornecedor.php');
}
$conexao->close();


?>