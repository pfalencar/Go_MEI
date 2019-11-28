<?php
session_start();
include("Conexao.php");
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Pesquisar Fornecedor</title>
	</head>

	<body>		
		<div class="cabecalho">
			<h2> Olá, 
	  		<?php  echo $_SESSION['nome_usuario']; ?>!
			</h2>
			<h2> <a href="logout.php"> Sair </a> </h2>
		</div>
		<hr>

		<p>Voltar para a <a href="painel.php">Página Inicial</a></p>


		<h1>Pesquisar Fornecedor</h1>

		<a href="CadFornecedor.php"> Novo </a>

		<?php
		  if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  }
		?>

		<form action="" method="POST"> 		

			<p><input type=text name=nomeFornecedor placeholder="Digite o nome do Fornecedor" size="100" >
			<input type="submit" name="SendPesqUser" value="Pesquisar" ></p>  

		</form>	

		<?php
		  $idusuario = $_SESSION['id_usuario'];
			//recebendo o botão
		  $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

		  //verificando se clicou no botao
		  if ($SendPesqUser) {
		  	$nomeFornecedor = filter_input(INPUT_POST,'nomeFornecedor', FILTER_SANITIZE_STRING);
		  	$result_fornecedor = "SELECT * FROM fornecedor WHERE id_usuario = '$idusuario' AND nome_razaosocial LIKE '%$nomeFornecedor%'";
		  	$resultado_fornecedor = mysqli_query($conexao, $result_fornecedor);
		?>

		<div>
				
				<table>
					<tr>
						<th>Id Fornecedor</th>
						<th>Nome/Razão Social</th>
						<th>CPF/CNPJ</th>
						<th>Inscrição Estadual</th>
						<th>Inscrição Municipal</th>
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
					</tr>


		  		<?php

		  			while( $row_fornecedor = mysqli_fetch_assoc($resultado_fornecedor) ) {
		
						echo 
							"<tr>
								<td>" . $row_fornecedor['id_fornecedor'] . "</td>
								<td>" . $row_fornecedor['nome_razaosocial'] . "</td>
								<td>" . $row_fornecedor['cpf_cnpj'] . "</td>
								<td>" . $row_fornecedor['inscricaoestadual'] . "</td>
								<td>" . $row_fornecedor['inscricaomunicipal'] . "</td>
								<td>" . $row_fornecedor['email'] . "</td>
								<td>" . $row_fornecedor['tel'] . "</td>
								<td>" . $row_fornecedor['cel'] . "</td>
								<td>" . $row_fornecedor['sexo'] . "</td>
								<td>" . $row_fornecedor['rg'] . "</td>
								<td>" . $row_fornecedor['nome_mae'] . "</td>
								<td>" . $row_fornecedor['nome_pai'] . "</td>
								<td>" . $row_fornecedor['cep'] . "</td>
								<td>" . $row_fornecedor['logradouro'] . "</td>
								<td>" . $row_fornecedor['numero'] . "</td>
								<td>" . $row_fornecedor['bairro'] . "</td>
								<td>" . $row_fornecedor['cidade'] . "</td>
								<td>" . $row_fornecedor['uf'] . "</td>
								<td><a href='edit_fornecedor.php?id=" . $row_fornecedor['id_fornecedor'] . "'>Editar</a></td>
								<td><a href='proc_apagar_fornecedor.php?id=" . $row_fornecedor['id_fornecedor'] . "'>Apagar</a></td>
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