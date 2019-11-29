<?php
session_start();
include('conexao.php')
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>G-MEI - Cadastrar Compra</title>
	</head>

	<body>
		<div class="cabecalho">
			<h2> Olá, 
	  		<?php  echo $_SESSION['nome_usuario']; ?>!
			</h2>
			<h2> <a href="logout.php"> Sair </a> </h2>
		</div>
		<hr>

		<a href="PesquisaCompra.php"> Pesquisar Compra </a>
		
		<h2>Cadastrar Compra</h2>
		<?php
			if( isset($_SESSION['msg']) ) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
		
		<?php
			$idusuario = $_SESSION['id_usuario'];			
			$result_fornecedores = "SELECT id_fornecedor, nome_razaosocial, cpf_cnpj FROM fornecedor WHERE id_usuario ='$idusuario'";
			$resultado_fornecedores = mysqli_query($conexao, $result_fornecedores);			
		?>

		<form action="proc_cad_compra.php" method="POST">
			<div>
				<input type="hidden" name=codcompra></p>

				<label>Fornecedor: </label>
				<select name=fornecedores>

				<?php
					while ($row_fornecedor = mysqli_fetch_assoc($resultado_fornecedores)) {
						echo "
					       <option value= ". $row_fornecedor['id_fornecedor'] .">". $row_fornecedor['nome_razaosocial'] ."</option>;
						";
					 }
				?>

				</select>
				
				<?php					
					$result_mei = "SELECT * FROM mei WHERE id_usuario ='$idusuario'";
					$resultado_mei = mysqli_query($conexao, $result_mei);			
				?>		
				
				
				<?php
					while ($row_mei = mysqli_fetch_assoc($resultado_mei)) {
						echo "
						       <input name='id_mei' type='hidden' value= ". $row_mei['id_mei'] . ">";
					 }
				?>
				
				<br><br>
				<p>Descrição da Compra: <input type=text name=descricaocompra></p>
				<p>Valor da Compra: <input type=text name=valorcompra></p>
				
				<br><br>
			    <input type="submit" value="Salvar" name="salvar">
			
				<br>

			</div>
		</form>
	</body>

</html>