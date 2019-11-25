<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_funcionario = "SELECT * FROM funcionario WHERE id_funcionario = '$id'";
$resultado_funcionario = mysqli_query($conexao, $result_funcionario);
$row_funcionario = mysqli_fetch_assoc($resultado_funcionario);

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Editar Funcionário</title>
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
		<a href="CadFuncionario.php">Cadastrar Funcionário</a><br>
		<a href="PesquisaFuncionario.php">Pesquisar Funcionário</a><br>

		<h2> Editar Funcionário </h2>

		<?php
		  if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  }
		?>

		<form action="proc_edit_funcionario.php" method="POST">
				
			
			<input type="hidden" name="id" value="<?php echo $row_funcionario['id_funcionario']; ?>"></p>

			<p>Nome: 
				<input type=text name=nome value="<?php echo $row_funcionario['nome']; ?>"></p>

			<p>CPF: 
				<input type=text name=cpf value="<?php echo $row_funcionario['cpf']; ?>"></p>

			<p>E-mail: 
				<input type=text name=email value="<?php echo $row_funcionario['email']; ?>"></p>

			<p>Telefone: 
				<input type=text name=telefone value="<?php echo $row_funcionario['tel']; ?>"></p>

			<p>Celular: 
				<input type=text name=celular value="<?php echo $row_funcionario['cel']; ?>"></p>

			<p>Sexo: 
				<input type=text name=sexo value="<?php echo $row_funcionario['sexo']; ?>"></p>

			<p>RG: 
				<input type=text name=rg value="<?php echo $row_funcionario['rg']; ?>"></p>

			<p>Nome da mãe: 
				<input type=text name=nomemae value="<?php echo $row_funcionario['nome_mae']; ?>"></p>

			<p>Nome do pai: 
				<input type=text name=nomepai value="<?php echo $row_funcionario['nome_pai']; ?>"></p>

			<p>CEP: 
				<input type=text name=cep value="<?php echo $row_funcionario['cep']; ?>"></p>

			<p>Logradouro: 
				<input type=text name=logradouro value="<?php echo $row_funcionario['logradouro']; ?>"></p>

			<p>Número: 
				<input type=text name=numero value="<?php echo $row_funcionario['numero']; ?>"></p>

			<p>Bairro: 
				<input type=text name=bairro value="<?php echo $row_funcionario['bairro']; ?>"></p>

			<p>Cidade: 
				<input type=text name=cidade value="<?php echo $row_funcionario['cidade']; ?>"></p>

			<p>UF: 
				<input type=text name=uf value="<?php echo $row_funcionario['uf']; ?>"></p>

			<p>Carteira de Trabalho: 
				<input type=text name=ctps value="<?php echo $row_funcionario['ctps']; ?>"></p>

			<p>PIS/PASEP: 
				<input type=text name=pispasep value="<?php echo $row_funcionario['pispasep']; ?>"></p>

			<p>Número da conta: 
				<input type=text name=numeroconta value="<?php echo $row_funcionario['numeroconta']; ?>"></p>

			<p>Tipo da conta: 
				<input type=text name=tipoconta value="<?php echo $row_funcionario['tipoconta']; ?>"></p>

			<p>Nome do banco: 
				<input type=text name=nomebanco value="<?php echo $row_funcionario['nomebanco']; ?>"></p>

			<p>Agência bancária: 
				<input type=text name=agenciabancaria value="<?php echo $row_funcionario['agenciabancaria']; ?>"></p>

			<br><br>
			  
		    <input type="submit" value="Editar">
			
			<br>
			
		</form>

		





	</body>

</html>



