<?php
session_start();
?>

<!DOCTYPE html>
<html>

  <head>
    <title>Index do Login</title>
    <meta charset="utf-8">
  <head>

  <body>
  	<form action="login.php" method="POST">
			<h2> Logar </h2>

			<?php 
				if (isset($_SESSION['nao_autenticado'])):
			?>
			<h4 style="color:red">E-mail ou senha inválidos!</h4>
			<?php 
			  endif;
			  unset($_SESSION['nao_autenticado']);
			?>

			<p> Preencha o formulário para criar sua conta! </p>
			<hr>
	  
			<p>E-mail: <input type=text name=email required></p>
			<p>Senha: <input type=password name=senha required></p><br>
			<button type=submit>OK</button>
	 		<br>
			<br>
			<a href="cadastro.php"> Não é cadastrado? Cadastre-se! </a>

		</form>
  </body>

</html>