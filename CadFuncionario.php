<?php
session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI</title>
	</head>

	<body>
		<div class="cabecalho">
			<h2> Olá, 
	  		<?php  echo $_SESSION['nome']; ?>!
			</h2>
			<h2> <a href="logout.php"> Sair </a> </h2>
		</div>
		<hr>

		<a href="PesquisaFuncionario.php"> Pesquisar Funcionário </a>
		
		<h2>Cadastrar Funcionário</h2>
		<?php
			if( isset($_SESSION['msg']) ) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>

		<form action="proc_cad_funcionario.php" method="POST">
			
			  <input type="hidden" name=codfuncionario></p><br>

			  <label>Nome: </label>
			  <input type="text" name="nome"><br><br>
			
			  <label>CPF: </label>
			  <input type="text" name="cpf"><br><br>

			  <label>E-mail: </label>
			  <input type="text" name="email"><br><br>

			  <label>Telefone: </label>
			  <input type="text" name="telefone"><br><br>

			  <label>Celular: </label>
			  <input type="text" name="celular"><br><br>

			  <label>Sexo: </label>
			  <input type="radio" name="sexo" value="M"> Masculino
			  <input type="radio" name="sexo" value="F"> Feminino<br><br>

			  <label>RG: </label>
			  <input type="text" name="rg"><br><br>

			  <label>Nome da mãe: </label>
			  <input type="text" name="nomemae"><br><br>

			  <label>Nome do pai: </label>
			  <input type="text" name="nomepai"><br><br>

			  <label>CEP: </label>
			  <input type=text name=cep></p>

			  <label>Logradouro: </label>
			  <input type="text" name="logradouro"><br><br>

			  <label>Número: </label>
			  <input type="text" name="numero"><br><br>

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

			  <label>Carteira de Trabalho: </label>
			  <input type="text" name="ctps"><br><br>

			  <label>PIS/PASEP: </label>
			  <input type="text" name="pispasep"><br><br>
				
			  <label>Número da conta: </label>
			  <input type="text" name="numeroconta"><br><br>

			  <label>Tipo de conta: </label>
			  <input type="text" name="tipoconta"><br><br>

			  <label>Nome do banco: </label>
			  <input type="text" name="nomebanco"><br><br>

			  <label>Agência bancária: </label>
			  <input type="text" name="agenciabancaria"><br><br>

			  <input type="submit" value="Salvar">
				<br>

			</div>
		</form>
	</body>

</html>



