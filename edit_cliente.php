<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$idusuario = $_SESSION['id_usuario'];
$result_cliente = "SELECT * FROM cliente WHERE id_usuario = '$idusuario' AND id_cliente = '$id'";
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
	  		<?php  echo $_SESSION['nome_usuario']; ?>!
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

			<p>E-mail: 
				<input type=email name=email value="<?php echo $row_cliente['email']; ?>"></p>

			<p>Telefone: 
				<input type=text name=telefone value="<?php echo $row_cliente['tel']; ?>"></p>

			<p>Celular: 
				<input type=text name=celular value="<?php echo $row_cliente['cel']; ?>"></p>

			<p>Sexo: 
				<input type=text name=sexo value="<?php echo $row_cliente['sexo']; ?>"></p>

			<p>RG: 
				<input type=text name=rg value="<?php echo $row_cliente['rg']; ?>"></p>

			<p>Nome da mãe: 
				<input type=text name=nomemae value="<?php echo $row_cliente['nome_mae']; ?>"></p>

			<p>Nome do pai: 
				<input type=text name=nomepai value="<?php echo $row_cliente['nome_pai']; ?>"></p>

			<p>CEP: 
				<input type=text name=cep value="<?php echo $row_cliente['cep']; ?>"></p>

			<p>Logradouro: 
				<input type=text name=logradouro value="<?php echo $row_cliente['logradouro']; ?>"></p>

			<p>Número: 
				<input type=text name=numero value="<?php echo $row_cliente['numero']; ?>"></p>

			<p>Bairro: 
				<input type=text name=bairro value="<?php echo $row_cliente['bairro']; ?>"></p>

			<p>Cidade: 
				<input type=text name=cidade value="<?php echo $row_cliente['cidade']; ?>"></p>

			<p>UF: 
				<input type=text name=uf value="<?php echo $row_cliente['uf']; ?>"></p>
			<br><br>
			  
		    <input type="submit" value="Editar">
			
			<br>
			
		</form>

	</body>

</html>



