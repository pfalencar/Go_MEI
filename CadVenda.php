<?php
session_start();
include_once("Conexao.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>G-MEI</title>
	</head>

	<body>
		<div class="cabecalho">
			<h2> Olá, 
	  		<?php  echo $_SESSION['nome_usuario']; ?>!
			</h2>
			<h2> <a href="logout.php"> Sair </a> </h2>
		</div>
		<hr>

		<a href="PesquisaVenda.php"> Pesquisar Venda </a>
		
		<h2>Cadastrar Venda</h2>
		<?php
			if( isset($_SESSION['msg']) ) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>

		<form action="proc_cad_venda.php" method="POST">
			<div>
				<input type="hidden" name=codvenda></p>
				<input type="hidden" name=codmei></p>
				<input type="hidden" name=codcliente></p>
				<input type="hidden" name=codservico></p>
				<input type="hidden" name=codestoque></p>

				<?php
					$idusuario = $_SESSION['id_usuario'];
					$result_estoque = "SELECT * FROM estoque WHERE id_usuario ='$idusuario'";
					$resultado_estoque = mysqli_query($conexao, $result_estoque);		
				?>

				<label>Descrição do Produto: </label>
				<select name=select_descricaoproduto>

				<?php
					while ($row_estoque = mysqli_fetch_assoc($resultado_estoque)) {
						$idestoque = $row_estoque['id_estoque'];
						$descricaoestoque = $row_estoque['descricaoEstoque'];
						$preco = $row_estoque['preco'];
						echo "
					       <option value= ". $idestoque .">". $descricaoestoque ."</option>;
						";
					 }
				?>

				</select>				
				<br>

				<p>Valor Unitário: 
				<?php
					$precoestoqueselec = filter_input(INPUT_POST, '$idestoque', FILTER_SANITIZE_STRING);
					$result_estoque = "SELECT * FROM estoque WHERE id_estoque ='$idestoque'";
					$resultado_estoque = mysqli_query($conexao, $result_estoque);
					$row_estoque = mysqli_fetch_assoc($resultado_estoque);					
				?>

				<input type=text name=valorunitario value="<?php echo $row_estoque['preco']; ?>"></p>

				<p>Quantidade: <input type=text name=qtd></p>

				<?php 
					$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
				?>

				<?php
					$idusuario = $_SESSION['id_usuario'];			
					$result_cliente = "SELECT * FROM cliente WHERE id_usuario ='$idusuario'";
					$resultado_cliente = mysqli_query($conexao, $result_cliente);		
				?>

				<label>Nome do Cliente: </label>
				<select name=select_nomecliente>

				<?php
					while ($row_cliente = mysqli_fetch_assoc($resultado_cliente)) {
						echo "
					       <option value= ". $row_cliente['id_cliente'] .">". $row_cliente['nome'] ."</option>;
						";
					 }
				?>

				</select>				
				<br>
				<p>Valor Recebido: <input type=text name=valorRecebido></p>

				<p>Troco: <input type=text name="<?php echo $preco_produto = $row_estoque['preco'];
				$valorRecebido ?>"></p>

				<label>Forma Pagamento: </label>
			    <select name="formaPgto">
					<option value="dinheiro">Dinheiro</option>
					<option value="cartaoCredito">Cartão de Crédito</option>
					<option value="cartaoDebito">Cartão de Débito</option>
					<option value="cheque">cheque</option>
					<option value="valeAlimentacao">Vale Alimentação</option>
					<option value="valeRefeicao">Vale Refeição</option>
				</select>


				<br><br>
			    <input type="submit" value="Salvar" name="salvar">
			
				<br>

			</div>
		</form>
	</body>

</html>



