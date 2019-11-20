<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_cliente = "SELECT * FROM cliente WHERE id_cliente = '$id'";
$resultado_cliente = mysqli_query($conexao, $result_cliente);
$row_cliente = mysqli_fetch_assoc($resultado_cliente);

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Editar</title>
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
		<a href="CadCliente.php">Cadastrar Cliente</a><br>
		<a href="PesquisaCliente.php">Pesquisar Cliente</a><br>

		<h2> Editar Cliente </h2>

		<?php
		  if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  }
		?>

		<form action="proc_edit_cliente.php" method="POST">
				
			
			<input type="hidden" name="id" value="<?php echo $row_cliente['id_cliente']; ?>"></p>

			<p>Nome: 
				<input type=text name=nome value="<?php echo $row_cliente['nome']; ?>"></p>

			<p>CPF: 
				<input type=text name=cpf value="<?php echo $row_cliente['cpf']; ?>"></p>

			<p>Sexo: 
				<input type=text name=sexo value="<?php echo $row_cliente['genero']; ?>"></p>

			<p>CEP: 
				<input type=text name=cep value="<?php echo $row_cliente['cep']; ?>"></p>

			<p>UF: 
				<input type=text name=uf value="<?php echo $row_cliente['uf']; ?>"></p>
			<br><br>
			  
		    <input type="submit" value="Editar">
			
			<br>
			
		</form>

		





	</body>

</html>



