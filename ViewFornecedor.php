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

		<form action="ControllerFornecedor.php" method="POST">

			<?php
		  	if (isset($_SESSION['status_cadastro'])):
		  ?>	  
		    <div>
				  <p>Cadastro do fornecedor efetuado com sucesso!<br>Voltar para a <a href="painel.php">Página Inicial</a></p>
				</div>			
		  <?php
		    endif;
				unset($_SESSION['status_cadastro']);
		  ?> 	
	  
		  <?php
		  	if (isset($_SESSION['fornecedor_existe'])):
		  ?>		  
				<div style="color: red">
				  <p> Este fornecedor já existe! Não é possível cadastrar novamente o mesmo fornecedor.</p>
				</div>
		  <?php
		    endif;
				unset($_SESSION['fornecedor_existe']);
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

			<div>
				<h2>Cadastro de Fornecedor</h2>

				<p>Código do Fornecedor: <input type=text name=codfornecedor></p><br>
				<p>Razão Social: <input type=text name=razaosocial></p>
				<p>Inscrição Estadual: <input type=text name=inscricaoestadual></p>
				<p>Inscrição Municipal: <input type=text name=inscricaomunicipal></p>

			  <br><br>
		    <button type="submit">Salvar </button>
				<br>

			</div>
		</form>
	</body>

</html>



