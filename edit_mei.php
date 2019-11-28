<?php
session_start();
include_once("Conexao.php");

$id_usuario = $_SESSION['id_usuario'];
$result_mei = "SELECT * FROM mei WHERE id_usuario = '$id_usuario'";
$resultado_mei = mysqli_query($conexao, $result_mei);


/*
//$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//$id = $_SESSION['id_mei'];k
$result_mei = "SELECT * FROM mei WHERE id_mei = '$id'";
$resultado_mei = mysqli_query($conexao, $result_mei);
$row_mei = mysqli_fetch_assoc($resultado_mei);
*/

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Editar MEI</title>
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
		<a href="CadMEI.php">Cadastrar MEI</a><br>

		<h2> Editar MEI </h2>

		<?php
		  if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  }
		?>

		<form action="proc_edit_mei.php" method="POST">
				
		<?php
			while ( $row_mei = mysqli_fetch_assoc($resultado_mei) ) {
		?>
			
			<input type="hidden" name="id" value="<?php echo $row_mei['id_mei']; ?>"></p>

			<p>Nome: 
				<input type=text name=nomecompleto value="<?php echo $row_mei['nomecompleto']; ?>"></p>

			<p>E-mail: 
				<input type=text name=email value="<?php echo $row_mei['email']; ?>"></p>


			<p>Razão Social: 
				<input type=text name=razaosocial value="<?php echo $row_mei['razaosocial']; ?>"></p>

			<p>CNPJ: 
				<input type=text name=cnpj value="<?php echo $row_mei['cnpj']; ?>"></p>

			<p>Ocupação Principal: 
				<input type=text name=ocupacaoprincipal value="<?php echo $row_mei['ocupacaoprincipal']; ?>"></p>

			<p>Ocupação Secundária: 
				<input type=text name=ocupacaosecundaria value="<?php echo $row_mei['ocupacaosecundaria']; ?>"></p>

			<p>CPF: 
				<input type=text name=cpf value="<?php echo $row_mei['cpf']; ?>"></p>

			<p>Telefone: 
				<input type=text name=telefone value="<?php echo $row_mei['tel']; ?>"></p>

			<p>Celular: 
				<input type=text name=celular value="<?php echo $row_mei['cel']; ?>"></p>

			<p>Sexo: 
				<input type=text name=sexo value="<?php echo $row_mei['sexo']; ?>"></p>

			<p>RG: 
				<input type=text name=rg value="<?php echo $row_mei['rg']; ?>"></p>

			<p>Nome da mãe: 
				<input type=text name=nome_mae value="<?php echo $row_mei['nome_mae']; ?>"></p>

			<p>Nome do pai: 
				<input type=text name=nome_pai value="<?php echo $row_mei['nome_pai']; ?>"></p>

			<p>CEP: 
				<input type=text name=cep value="<?php echo $row_mei['cep']; ?>"></p>
			
			<p>Logradouro: 
				<input type=text name=logradouro value="<?php echo $row_mei['logradouro']; ?>"></p>

			<p>Número: 
				<input type=text name=numero value="<?php echo $row_mei['numero']; ?>"></p>

			<p>Bairro: 
				<input type=text name=bairro value="<?php echo $row_mei['bairro']; ?>"></p>

			<p>Cidade: 
				<input type=text name=cidade value="<?php echo $row_mei['cidade']; ?>"></p>

			<p>UF: 
				<input type=text name=uf value="<?php echo $row_mei['uf']; ?>"></p>
			<br><br>

			<?php 
				}
			?> 
			 
		    <input type="submit" value="Editar">
			
			<br>
			
		</form>

		





	</body>

</html>



