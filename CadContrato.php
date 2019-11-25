<?php
session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>G-MEI - Cadastrar Contrato do Funcionário</title>
	</head>

	<body>
		<div class="cabecalho">
			<h2> Olá, 
	  		<?php  echo $_SESSION['nome']; ?>!
			</h2>
			<h2> <a href="logout.php"> Sair </a> </h2>
		</div>
		<hr>

		<a href="PesquisaContrato.php"> Pesquisar Contrato do Funcionário</a>
		
		<h2>Cadastrar Contrato do Funcionário</h2>
		<?php
			if( isset($_SESSION['msg']) ) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}

		?>

		<form action="proc_cad_contrato.php" method="POST">
			<div>
				<input type="hidden" name=codcontrato></p>
				<input type=hidden name=codmei></p>
				<input type=hidden name=codfuncionario></p>
				
				<label>Funcionário: </label>
				<p>
		<?php

			$id_microemp = $_SESSION['id_mei'] ;

			$result_funcionarios = "SELECT * FROM funcionario WHERE id_mei ='$id_microemp'";

	  		$resultado_funcionarios = mysqli_query($conexao, $result_funcionarios);
	  
		    while ( $row_funcionarios = mysqli_fetch_assoc($resultado_funcionarios) ) {
			  
			    echo $row_funcionario['nome'];
			 }
		?>
			</p>
		
				<br><br>
				<p>Início do contrato: <input type=text name=iniciocontrato></p>
				<p>Fim do  contrato: <input type=text name=fimcontrato></p>
				<p>Horário de serviço: <input type=text name=horarioservico></p>
				<p>Valor/Hora: <input type=text name=valorhora></p>
				<p>Data de Pagamento: <input type=text name=dtpagamento></p>
				<p>Valor eo Pagamento: <input type=text name=valorpagamento></p>
				<br><br>
			    <input type="submit" value="Salvar" name="salvar">
			
				<br>

			</div>
		</form>
	</body>

</html>



