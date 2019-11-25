<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_contrato = "SELECT * FROM contrato WHERE id_contrato = '$id'";
$resultado_contrato = mysqli_query($conexao, $result_contrato);
$row_contrato = mysqli_fetch_assoc($resultado_contrato);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Editar Contrato de Funcionário</title>
	</head>

	<body>
		<div class="cabecalho">
			<h2> Olá, 
	  		<?php  echo $_SESSION['nome']; ?>!
			</h2>
			<h2> <a href="logout.php"> Sair </a> </h2>
		</div>
		<hr>
		<a href="painel.php">Home</a><br>
		<a href="CadContrato.php">Cadastrar Contrato de Funcionário</a><br>
		<a href="PesquisaContrato.php">Pesquisar Contrato de Funcionário</a><br>

		<h2> Editar Contrato de Funcionário</h2>

		<?php
		  if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  }
		?>

		<form action="proc_edit_contrato.php" method="POST">
				
			
			<input type="hidden" name="id" value="<?php echo $row_contrato['id_contrato']; ?>"></p>
			<input type="hidden" name="idmei" value="<?php echo $row_contrato['id_mei']; ?>"></p>
			<input type="hidden" name="idfuncionario" value="<?php echo $row_contrato['id_funcionario']; ?>"></p>

			<p>Início do contrato: 
				<input type=text name=iniciocontrato value="<?php echo $row_contrato['iniciocontrato']; ?>"></p>

			<p>Fim do  contrato: 
				<input type=text name=fimcontrato value="<?php echo $row_contrato['fimcontrato']; ?>"></p>

			<p>Horário de serviço: 
				<input type=text name=horarioservico value="<?php echo $row_contrato['horarioservico']; ?>"></p>
				
			<p>Valor/Hora: 
			<input type=text name=valorhora value="<?php echo $row_contrato['valorhora']; ?>"></p>

			<p>Data de Pagamento: 
				<input type=text name=dtpagamento value="<?php echo $row_contrato['dtpagamento']; ?>"></p>

			<p>Valor de Pagamento: 
				<input type=text name=valorpagamento value="<?php echo $row_contrato['valorpagamento']; ?>"></p>

			<br><br>
			  
		    <input type="submit" value="Editar">
			
			<br>
			
		</form>

		





	</body>

</html>



