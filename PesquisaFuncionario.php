<?php
session_start();
include("Conexao.php");
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Pesquisar Funcionário</title>
	</head>

	<body>		
		<div class="cabecalho">
			<h2> Olá, 
	  		<?php  echo $_SESSION['nome']; ?>!
			</h2>
			<h2> <a href="logout.php"> Sair </a> </h2>
		</div>
		<hr>

		<p>Voltar para a <a href="painel.php">Página Inicial</a></p>
		<br>
		<p>  
	  		<?php  
	  		if ( isset($_SESSION['msg']) ) {
	  			echo $_SESSION['msg'];
	  			unset($_SESSION['msg']);
	  		}
	  		 ?>
		</p>

		<h1>Pesquisar Funcionário</h1>

		<a href="CadFuncionario.php"> Novo </a>


		<form action="" method="POST"> 		

			<p><input type=text name=nomeFuncionario placeholder="Digite o nome do Funcionário" size="100" >
			<input type="submit" name="SendPesqUser" value="Pesquisar" ></p>  

		</form>	

		<?php
			//recebendo o botão
		  $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

		  //verificando se clicou no botao
		  if ($SendPesqUser) {
		  	$nomefuncionario = filter_input(INPUT_POST,'nomeFuncionario', FILTER_SANITIZE_STRING);
		  	$result_funcionario = "SELECT * FROM funcionario WHERE nome LIKE '%$nomefuncionario%'";
		  	$resultado_funcionario = mysqli_query($conexao, $result_funcionario);
		?>

		<div>
				
			<table>
				<tr>
					<th>Id Funcionário</th>
					<th>Nome</th>
					<th>CPF</th>
					<th>E-mail</th>
					<th>Telefone</th>
					<th>Celular</th>
					<th>Sexo</th>
					<th>RG</th>
					<th>Nome da mãe</th>
					<th>Nome do pai</th>
					<th>CEP</th>
					<th>Logradouro</th>
					<th>Número</th>
					<th>Bairro</th>
					<th>Cidade</th>
					<th>UF</th>	
					<th>CTPS</th>
					<th>PIS/PASEP</th>
					<th>Número da Conta</th>
					<th>Tipo de Conta</th>
					<th>Nome do Banco</th>
					<th>Agência Bancária</th>						
				</tr>


		  		<?php

		  			while( $row_funcionario = mysqli_fetch_assoc($resultado_funcionario) ) {
		
						echo 
							"<tr>
								<td>" . $row_funcionario['id_funcionario'] . "</td>
								<td>" . $row_funcionario['nome'] . "</td>
								<td>" . $row_funcionario['cpf'] . "</td>
								<td>" . $row_funcionario['email'] . "</td>								
								<td>" . $row_funcionario['tel'] . "</td>
								<td>" . $row_funcionario['cel'] . "</td>
								<td>" . $row_funcionario['sexo'] . "</td>
								<td>" . $row_funcionario['rg'] . "</td>
								<td>" . $row_funcionario['nome_mae'] . "</td>
								<td>" . $row_funcionario['nome_pai'] . "</td>
								<td>" . $row_funcionario['cep'] . "</td>
								<td>" . $row_funcionario['logradouro'] . "</td>
								<td>" . $row_funcionario['numero'] . "</td>
								<td>" . $row_funcionario['bairro'] . "</td>
								<td>" . $row_funcionario['cidade'] . "</td>
								<td>" . $row_funcionario['uf'] . "</td>
								<td>" . $row_funcionario['ctps'] . "</td>
								<td>" . $row_funcionario['pispasep'] . "</td>
								<td>" . $row_funcionario['numeroconta'] . "</td>
								<td>" . $row_funcionario['tipoconta'] . "</td>
								<td>" . $row_funcionario['nomebanco'] . "</td>
								<td>" . $row_funcionario['agenciabancaria'] . "</td>
								<td><a href='edit_funcionario.php?id=" . $row_funcionario['id_funcionario'] . "'>Editar</a></td>
								<td><a href='proc_apagar_funcionario.php?id=" . $row_funcionario['id_funcionario'] . "'>Apagar</a></td>
							</tr>";
		  			}
			}
					?>
		
			</table>
				<br><br>
				<br><br>
		    
				<br><br>

		</div>

		
	</body>

</html>