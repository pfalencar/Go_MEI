<?php
session_start();
include_once("Conexao.php");

$id_estoque = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_estoque = "SELECT * FROM estoque WHERE id_estoque = '$id_estoque'";
$resultado_estoque = mysqli_query($conexao, $result_estoque);
$row_estoque = mysqli_fetch_assoc($resultado_estoque);

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Editar Estoque</title>
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
		<a href="CadEstoque.php">Cadastrar Estoque</a><br>
		<a href="PesquisaEstoque.php">Pesquisar Estoque</a><br>

		<h2> Editar Estoque </h2>

		<?php
		  if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  }
		?>

		<form action="proc_edit_estoque.php" method="POST">
				
			
			<input type="hidden" name="id_estoque" value="<?php echo $row_estoque['id_estoque']; ?>"></p>

			<p>Descrição do Produto: 
				<input type=text name=descricaoestoque value="<?php echo $row_estoque['descricaoestoque']; ?>"></p>

			<p>Preço: 
				<input type=text name=preco value="<?php echo $row_estoque['preco']; ?>"></p>

			<p>Quantidade: 
				<input type=text name=quantidade value="<?php echo $row_estoque['quantidade']; ?>"></p>

			<br><br>
			  
		    <input type="submit" value="Editar">
			
			<br>
			
		</form>

		





	</body>

</html>



