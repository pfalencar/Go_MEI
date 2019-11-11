<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cadastro</title>
  </head>
  <body>

    <div>
    	<form action="cadastrar.php" method="POST">
			  <h3>Cadastro de Usuário</h3>
			  
			  <?php
			  	if (isset($_SESSION['status_cadastro'])):
			  ?>	  
			    <div>
					  <p>Cadastro efetuado com sucesso!<br>Faça o login <a href="login.php">aqui</a></p>
					</div>			
			  <?php
			    endif;
					unset($_SESSION['status_cadastro']);
			  ?> 	
		  
			  <?php
			  	if (isset($_SESSION['usuario_existe'])):
			  ?>		  
					<div style="color: red">
					  <p> O usuário escolhido já existe! Informe outro e tente novamente.</p>
					</div>
			  <?php
			    endif;
					unset($_SESSION['usuario_existe']);
			  ?>	

				<br>

				<div>			  
			  	<p>Nome:<input type="text" name="nome" autofocus></p>					 
				  <p>E-mail:<input type="text" name="email"></p>
				  <p>Senha:<input type="password" name="senha"></p>				
					<br><br>				
					<button type="submit">Cadastrar</button>					
				</div>	   
			</form>

		</div>
  
  </body>  
</html>  