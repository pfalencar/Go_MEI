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
	  		<?php  echo $_SESSION['nome_usuario']; ?>!
			</h2>
			<h2> <a href="logout.php"> Sair </a> </h2>
		</div>
		<hr>

		<a href="PesquisaFornecedor.php"> Pesquisar Fornecedor </a>
		
		<h2>Cadastrar Fornecedor</h2>
		<?php
			if( isset($_SESSION['msg']) ) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>

		<form action="proc_cad_fornecedor.php" method="POST">
			<div>
				<input type="hidden" name=codfornecedor>

				<label>Nome/Razão Social:</label>
			    <input type=text name=nome_razaosocial required><br><br>

				<label>CPF/CNPJ: </label>
				<input type=text name=cpf_cnpj required></p>

				<label>Inscrição Estadual: </label>
				<input type=text name=inscricaoestadual required><br><br>

				<label>Inscrição Municipal: </label>
				<input type=text name=inscricaomunicipal required><br><br>
				
				<label>E-mail:</label>
				<input type=email name=email><br><br>

				<label>Telefone: </label>
			    <input type="text" name="telefone"><br><br>

			  <label>Celular: </label>
			  <input type="text" name="celular" required><br><br>

			  <label>Sexo: </label>
			  <input type="radio" name="sexo" value="M"> Masculino
			  <input type="radio" name="sexo" value="F"> Feminino<br><br>

			  <label>RG: </label>
			  <input type="text" name="rg"><br><br>

			  <label>Nome da mãe: </label>
			  <input type="text" name="nome_mae"><br><br>

			  <label>Nome do pai: </label>
			  <input type="text" name="nome_pai"><br><br>

			  <label>CEP: </label>
			  <input type=text name=cep required></p>

			  <label>Logradouro: </label>
			  <input type="text" name="logradouro"><br><br>

			  <label>Número: </label>
			  <input type="text" name="numero" required><br><br>

			  <label>Bairro: </label>
			  <input type="text" name="bairro"><br><br>

			  <label>Cidade: </label>
			  <input type="text" name="cidade"><br><br>

			  <label>UF: </label>
			    <select name="uf">
					<option value="AC">AC</option>
					<option value="AL">AL</option>
					<option value="AP">AP</option>
					<option value="AM">AM</option>
					
					<option value="BA">BA</option>
					<option value="CE">CE</option>
					<option value="DF">DF</option>
					<option value="ES">ES</option>
					
					<option value="GO">GO</option>
					<option value="MA">MA</option>
					<option value="MT">MT</option>
					<option value="MS">MS</option>
					
					<option value="MG">MG</option>
					<option value="PA">PA</option>
					<option value="PB">PB</option>
					<option value="PR">PR</option>
					
					<option value="PE">PE</option>
					<option value="PI">PI</option>
					<option value="RJ">RJ</option>
					<option value="RN">RN</option>
					
					<option value="RS">RS</option>
					<option value="RO">RO</option>
					<option value="RR">RR</option>
					<option value="SC">SC</option>
					
					<option value="SP">SP</option>
					<option value="SE">SE</option>
					<option value="TO">TO</option>
					
				</select>
				<br><br>
			    <input type="submit" value="Salvar" name="salvar">
			
				<br>

			</div>
		</form>
	</body>

</html>



