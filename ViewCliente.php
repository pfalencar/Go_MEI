<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<title> Tela Cadastro de Cliente </title>
  <head>
  <body>

  	<div class="cabecalho">
			<h2> Olá, 
	  		<?php  echo $_SESSION['nome']; ?>!
			</h2>
			<h2> <a href="logout.php"> Sair </a> </h2>
		</div>
		<hr>

    <h2> Cadastro de Cliente </h2>
	
		<form action="ControllerCliente.php" method="POST">
		
			<?php
		  	if (isset($_SESSION['status_cadastro'])):
		  ?>	  
		    <div>
				  <p>Cadastro do cliente efetuado com sucesso!<br>Voltar para a <a href="painel.php">Página Inicial</a></p>
				</div>			
		  <?php
		    endif;
				unset($_SESSION['status_cadastro']);
		  ?> 	
	  
		  <?php
		  	if (isset($_SESSION['cliente_existe'])):
		  ?>		  
				<div style="color: red">
				  <p> Este CPF já existe! Não é possível cadastrar novamente a mesma pessoa.</p>
				</div>
		  <?php
		    endif;
				unset($_SESSION['cliente_existe']);
		  ?>	

		  <?php
		  	if (isset($_SESSION['campo_vazio'])):
		  ?>		  
				<div style="color: red">
				  <p> Há algum campo vazio! Verifique se há algum campo em branco.</p>
				</div>
		  <?php
		    endif;
				unset($_SESSION['campo_vazio']);
		  ?>	

			<p>Código do Cliente: <input type=text name=codcliente></p><br>
			<p>Nome: <input type=text name=nome></p>
			<p>CPF: <input type=text name=cpf></p>
			
			<p>Sexo: <br>
			  <input type="radio" name="sexo" value="M"> Masculino
			  <input type="radio" name="sexo" value="F"> Feminino<br>		
			
			<p>CEP: <input type=text name=cep></p>		
			
			<p>UF: 
			  <select name="uf">
				<option value="acre">AC</option>
				<option value="alagoas">AL</option>
				<option value="amapa">AP</option>
				<option value="amazonas">AM</option>
				
				<option value="bahia">BA</option>
				<option value="ceara">CE</option>
				<option value="distritofederal">DF</option>
				<option value="espiritosanto">ES</option>
				
				<option value="goias">GO</option>
				<option value="maranhao">MA</option>
				<option value="matogrosso">MT</option>
				<option value="matogrossodosul">MS</option>
				
				<option value="minasgerais">MG</option>
				<option value="para">PA</option>
				<option value="paraiba">PB</option>
				<option value="parana">PR</option>
				
				<option value="pernambuco">PE</option>
				<option value="piaui">PI</option>
				<option value="riodejaneiro">RJ</option>
				<option value="riograndedonorte">RN</option>
				
				<option value="riograndedosul">RS</option>
				<option value="rondonia">RO</option>
				<option value="roraima">RR</option>
				<option value="santacatarina">SC</option>
				
				<option value="saopaulo">SP</option>
				<option value="sergipe">SE</option>
				<option value="tocantins">TO</option>
				
			  </select>
			  <br><br>
			
			
			
			<input type=submit value="Salvar">
		
		</form>
  </body>
</html>

<!--

<p>Código do Cliente: <input type=text name=codcliente></p><br>
			<p>Nome: <input type=text name=nome></p>
			<p>CPF: <input type=text name=cpf></p>
			<p>E-mail: <input type=text name=email></p>
			<p>Telefone: <input type=text name=tel></p>
			<p>Celular: <input type=text name=cel></p>
			
			<p>Sexo: <br>
			  <input type="radio" name="genero" value="M"> Masculino
			  <input type="radio" name="genero" value="F"> Feminino<br>
			
			<p>RG: <input type=text name=rg></p>
			<p>Nome da mãe: <input type=text name=nomemae></p>
			<p>Nome do pai: <input type=text name=nomepai></p>		
			
			<p>CEP: <input type=text name=cep></p>		
			<p>Logradouro: <input type=text name=logradouro>
			Número: <input type=text name=numerocasa></p>
			<p>Bairro: <input type=text name=bairro></p>
			<p>Cidade: <input type=text name=cidade></p>
			
			<p>UF: 
			  <select name="ufs">
				<option value="acre">AC</option>
				<option value="alagoas">AL</option>
				<option value="amapa">AP</option>
				<option value="amazonas">AM</option>
				
				<option value="bahia">BA</option>
				<option value="ceara">CE</option>
				<option value="distritofederal">DF</option>
				<option value="espiritosanto">ES</option>
				
				<option value="goias">GO</option>
				<option value="maranhao">MA</option>
				<option value="matogrosso">MT</option>
				<option value="matogrossodosul">MS</option>
				
				<option value="minasgerais">MG</option>
				<option value="para">PA</option>
				<option value="paraiba">PB</option>
				<option value="parana">PR</option>
				
				<option value="pernambuco">PE</option>
				<option value="piaui">PI</option>
				<option value="riodejaneiro">RJ</option>
				<option value="riograndedonorte">RN</option>
				
				<option value="riograndedosul">RS</option>
				<option value="rondonia">RO</option>
				<option value="roraima">RR</option>
				<option value="santacatarina">SC</option>
				
				<option value="saopaulo">SP</option>
				<option value="sergipe">SE</option>
				<option value="tocantins">TO</option>
				
			  </select>

-->