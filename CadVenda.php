<?php
session_start();

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
	  		<?php  echo $_SESSION['nome']; ?>!
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
				<p>Produto ou Serviço: <input type=text name=produto_servico></p>
				<p>Data da Venda: <input type=text name=dtVenda></p>
				<p>Quantidade: <input type=text name=qtd></p>
				<p>Valor Total: <input type=text name=valorTotal></p>
				<p>Valor Recebido: <input type=text name=valorRecebido></p>
				<p>Troco: <input type=text name=troco></p>

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



