<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Go! MEI</title>	
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
<link rel="stylesheet" type="text/css" href="styles/forms.css"/>
</head>

<body>

<div class="header">
	<div class="conexao">
	<a  href="PesquisaEstoque.php"><b>Voltar</b></a>
 	
 	</div>

   <a class="logo" href="painel.php"><h1>Go! MEI</h1></a>
  
</div>

<div class="row">
  <div class="col-3 col-s-3 menu">
    <ul>
	<li class="dropdown">
    <a href="" class="dropbtn">Catálogo</a>
    <div class="dropdown-content">
       <a href="PesquisaEstoque.php">Estoque</a>
	  <a href="PesquisaServico.php">Serviços</a>
	
      
    </div>
  </li>
  <li class="dropdown">
    <a href="" class="dropbtn">Vendas</a>
    <div class="dropdown-content">
	 <a href="ViewVenda.php">Vendas</a>
      <a href="PesquisaCliente.php">Clientes</a>
      </div>
  </li>
   <li class="dropdown">
    <a href="" class="dropbtn">Compras</a>
    <div class="dropdown-content">
	  <a href="PesquisaCompra.php">Compras</a>
      <a href="PesquisaFornecedor.php">Fornecedores</a>
         
    </div>
  </li>

  <li class="dropdown">
    <a href="" class="dropbtn">Funcionários</a>
    <div class="dropdown-content">
	  <a href="ViewFuncionario.php">Cadastrar Funcionário</a>
      <a href="ViewContratacao.php">Contratar Funcionário</a>
         
    </div>
  </li>
  
  <!--<a href="#">Relatórios</a>-->
  
   <li class="dropdown">
    <a href="" class="dropbtn">Configurações</a>
    <div class="dropdown-content">
      <a href="meumei.php">Minha Empresa</a>
      <a href="CadMEI.php">Meus Dados</a>
	  <a href="Usuarios.html">Usuários</a>
      <a href="logout.php">Sair</a>
    </div>
  </li>
</ul>
  </div>

		<div class="col-6 col-s-9">
		<h2>Cadastrar Produto</h2>
		<a href="PesquisaEstoque.php"> Pesquisar Estoque </a>
		<?php
			if( isset($_SESSION['msg']) ) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>

		<form action="proc_cad_estoque.php" method="POST">
			<div class="container">
  
            <h2>Dados Gerais</h2>
	        <hr>
			   <input type="hidden" name=codestoque></p><br>

        <label>Descrição do Produto: </label>
        <input type="text" name="descricaoEstoque"><br><br>
      
        <label>Preco: </label>
        <input type="text" name="preco"><br><br>

        <label>Quantidade: </label>
        <input type="text" name="quantidade"><br><br>
				
			  <hr>
	
       <button type="submit" class="registerbtn"  value="Salvar">Salvar</button>
       </div>
		</form>

	</div>


  <!--<div class="col-3 col-s-12">
    <div class="aside">
      <h2>What?</h2>
      <p>Chania is a city on the island of Crete.</p>
      <h2>Where?</h2>
      <p>Crete is a Greek island in the Mediterranean Sea.</p>
      <h2>How?</h2>
      <p>You can reach Chania airport from all over Europe.</p>
    </div>
  </div>-->

</div>

<div class="footer">
  <p>Copyright © 2019 Go! MEI</p>
</div>

</body>
</html>