<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$idusuario = $_SESSION['id_usuario'];
$result_fornecedor = "SELECT * FROM fornecedor WHERE id_usuario = '$idusuario' AND id_fornecedor = '$id'";
$resultado_fornecedor = mysqli_query($conexao, $result_fornecedor);
$row_fornecedor = mysqli_fetch_assoc($resultado_fornecedor);

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Editar Fornecedor</title>
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
		<a href="CadFornecedor.php">Cadastrar Fornecedor</a><br>
		<a href="PesquisaFornecedor.php">Pesquisar Fornecedor</a><br>

		<h2> Editar Fornecedor </h2>

		<?php
		  if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  }
		?>

		<form action="proc_edit_fornecedor.php" method="POST">
				
			
			<input type="hidden" name="id" value="<?php echo $row_fornecedor['id_fornecedor']; ?>"></p>

			<p>Nome/Razão Social: 
				<input type=text name=nome_razaosocial value="<?php echo $row_fornecedor['nome_razaosocial']; ?>"></p>

			<p>CPF/CNPJ: 
				<input type=text name=cpf_cnpj value="<?php echo $row_fornecedor['cpf_cnpj']; ?>"></p>

			<p>Inscrição Estadual: 
				<input type=text name=inscricaoestadual value="<?php echo $row_fornecedor['inscricaoestadual']; ?>"></p>

			<p>Inscrição Municipal: 
				<input type=text name=inscricaomunicipal value="<?php echo $row_fornecedor['inscricaomunicipal']; ?>"></p>

			<p>E-mail: 
				<input type=email name=email value="<?php echo $row_fornecedor['email']; ?>"></p>

			<p>Telefone: 
				<input type=text name=telefone value="<?php echo $row_fornecedor['tel']; ?>"></p>

			<p>Celular: 
				<input type=text name=celular value="<?php echo $row_fornecedor['cel']; ?>"></p>

			<p>Sexo: 
				<input type=text name=sexo value="<?php echo $row_fornecedor['sexo']; ?>"></p>

			<p>RG: 
				<input type=text name=rg value="<?php echo $row_fornecedor['rg']; ?>"></p>

			<p>Nome da mãe: 
				<input type=text name=nome_mae value="<?php echo $row_fornecedor['nome_mae']; ?>"></p>

			<p>Nome do pai: 
				<input type=text name=nome_pai value="<?php echo $row_fornecedor['nome_pai']; ?>"></p>

			<p>CEP: 
				<input type=text name=cep value="<?php echo $row_fornecedor['cep']; ?>"></p>

			<p>Logradouro: 
				<input type=text name=logradouro value="<?php echo $row_fornecedor['logradouro']; ?>"></p>

			<p>Número: 
				<input type=text name=numero value="<?php echo $row_fornecedor['numero']; ?>"></p>

			<p>Bairro: 
				<input type=text name=bairro value="<?php echo $row_fornecedor['bairro']; ?>"></p>

			<p>Cidade: 
				<input type=text name=cidade value="<?php echo $row_fornecedor['cidade']; ?>"></p>

			<p>UF: 
				<input type=text name=uf value="<?php echo $row_fornecedor['uf']; ?>"></p>


			<br><br>
			  
		    <input type="submit" value="Editar">
			
			<br>
			
		</form>

		





	</body>

</html>



