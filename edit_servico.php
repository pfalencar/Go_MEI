<?php
session_start();
include_once("Conexao.php");

$id_servico = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_servico = "SELECT * FROM servico WHERE id_servico = '$id_servico'";
$resultado_servico = mysqli_query($conexao, $result_servico);
$row_servico = mysqli_fetch_assoc($resultado_servico);

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Editar Serviço</title>
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
		<a href="CadServico.php">Cadastrar Serviço</a><br>
		<a href="PesquisaServico.php">Pesquisar Serviço</a><br>

		<h2> Editar Serviço </h2>

		<?php
		  if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  }
		?>

		<form action="proc_edit_servico.php" method="POST">
				
			
			<input type="hidden" name="id_servico" value="<?php echo $row_servico['id_servico']; ?>"></p>

			<p>Descrição do Produto: 
				<input type=text name=descricaoservico value="<?php echo $row_servico['descricaoservico']; ?>"></p>

			<p>Preço: 
				<input type=text name=precoservico value="<?php echo $row_servico['precoservico']; ?>"></p>

			<p>Quantidade: 
				<input type=text name=quantidadeservico value="<?php echo $row_servico['quantidadeservico']; ?>"></p>

			<br><br>
			  
		    <input type="submit" value="Editar">
			
			<br>
			
		</form>

		





	</body>

</html>



