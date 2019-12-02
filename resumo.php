<?php
session_start();
include('Conexao.php');
date_default_timezone_set('America/Sao_Paulo');
$data = new DateTime(); 
$dataformat = $data->format('Y-m-d');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
<link rel="stylesheet" type="text/css" href="styles/formContact.css"/>
<link rel="stylesheet" type="text/css" href="styles/logo.css"/>
<link rel="stylesheet" type="text/css" href="styles/table.css"/>
<link rel="stylesheet" type="text/css" href="styles/painel.css"/>
<link rel="stylesheet" type="text/css" href="styles/button.css"/>
</head>
<body>

<div class="header">
  <div class="conexao">
  <a  href="painel.php"><b>Voltar</b></a>
  
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
   <a href="PesquisaVenda.php">Vendas</a>
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
    <div class="container">
       <h1>RESUMO DIÁRIO</h1>
    <form action="#" method="POST">
      <h3>Escolha a data para saber seu resumo diário</h3>
      <input type="date" name="datae" min="2000-01-01" max="2030-12-31" required="required"/>
      <button type="submit" name="pressbutton" class="button">Atualizar</button>
    </form>    

    <?php

     $pb = filter_input(INPUT_POST, 'pressbutton', FILTER_SANITIZE_STRING);

     if($pb) {
      $datae = $_POST['datae'];
     }
     else{
      $datae = $dataformat;
     }
 
        $timestamp = strtotime($datae);
 
        $escolhida_date = date("d/m/Y", $timestamp);

        $idusuario = $_SESSION['id_usuario'];

        

      

     ?>
    </div>   
    <div class="container">
      <h1>VENDAS <?php echo $escolhida_date; ?></h1>


      <!-- Nº Vendas realizadas diario -->

      <?php
      /* 
        $numerodevendasR = ("SELECT id_venda FROM tb_vendas WHERE dia = '$dataformat' ORDER BY id_venda");

          if($nvendasR = $conexao->query($numerodevendasR)) {
            $ntvendasR = $nvendasR->num_rows;

          }
          else
          {
             $ntvendasR = 0;
          }

      ?>

      <!-- Nº Vendas canceladas diario -->

      <?php 
      
        $numerodevendasC = ("SELECT id_venda FROM tb_vendas WHERE dia = '$dataformat' AND situacao = 'CANCELADA' ORDER BY id_venda");

          if($nvendasC = $conexao->query($numerodevendasR)) {
            $ntvendasC = $nvendasC->num_rows;

          }
          else
          {
            $ntvendasC = 0;
          }  

           
      ?>


      <!-- Valor total das vendas -->

      <?php
        $valortotalvendas = ("SELECT SUM(valor) AS resultado FROM tb_vendas WHERE dia = '$dataformat' AND situacao = 'REALIZADA'");

          if ($totalvalorvendas = $conexao->query($valortotalvendas)) {
            $tvlrvendas = $totalvalorvendas->fetch_assoc();
          }
          else 
          {
            $tvlrvendas = 0;
          }  
          */
      ?>

        <table id="customers">
  <tr>
   <th>Vendas Realizadas</th>
    <th>Vendas Canceladas</th>
    <th>Valor Total</th>
  
  </tr>
  <tr>
    <td><STRONG><?php /*  printf("%d", $ntvendasR); */ ?></STRONG></td>
    <td><STRONG><?php /* printf("%d", $ntvendasC); */ ?></td>
    <td><STRONG><?php /* printf("%d", $tvlrvendas["resultado"]); */ ?></td>
  
  </tr>
 
</table>


    </div>  

    <div class="container">
      <H1>ESTOQUE <?php echo $escolhida_date; ?></H1>

      <!-- Nº Produtos cadastrados diario -->

      <?php 
  
        $ndeprodutoscadastrados = ("SELECT SUM(quantidade) AS resultado FROM estoque WHERE id_usuario = '$idusuario' AND dt = '$datae'");

          if($nprodutoscad = $conexao->query($ndeprodutoscadastrados)) {
            $pcadastrados = $nprodutoscad->fetch_assoc();
          }
          else
          {
            $pcadastrados = 01;
          }

           
      ?>

      <!-- Nº de produtos vendidos diario -->

      <?php 
  
        $ndeprodutosvendidos = ("SELECT id_estoque FROM estoque WHERE id_usuario = '$idusuario' AND dt = '$datae' AND situacao = 'VENDIDOS' ORDER BY id_estoque");

          if($nprodutosven = $conexao->query($ndeprodutosvendidos)) {
            $pvendidos = $nprodutosven->num_rows;

          }
          else
          {
            $pvendidos = 01;
          }

      ?>


      <!-- Nº de produtos em estoque -->

      <?php

      $totaldeprodutoscadastrados = ("SELECT SUM(quantidade) AS resultado FROM estoque WHERE id_usuario = '$idusuario'");

          if($tprodutoscad = $conexao->query($totaldeprodutoscadastrados)) {
            $tcadastrados = $tprodutoscad->fetch_assoc();
          }
          else
          {
            $tcadastrados = 01;
          }

          $tcad = $tcadastrados["resultado"] - $pvendidos;
      
      ?>

             <table id="customers">
  <tr>
    <th>Adicionados</th>
    <th>Vendidos</th>
    <th>Total em Estoque</th>
  
  </tr>
  <tr>
    <td><?php  printf("%d", $pcadastrados["resultado"]); ?> Un</td>
    <td><?php  printf("%d", $pvendidos); ?> Un</td>
    <td><?php  printf("%d", $tcad); ?> Un</td>

  </tr>
  
</table>

    </div>  

    <div class="container">
      <H1>CLIENTES <?php echo $escolhida_date; ?></H1>  

      <!-- Nº CLientes cadastrados diario -->

      <?php 
      
        $ndeclientescadastrados = ("SELECT id_cliente FROM cliente WHERE id_usuario = '$idusuario' AND dt = '$datae' ORDER BY id_cliente");

          if($nclientescad = $conexao->query($ndeclientescadastrados)) {
            $clicadastrados = $nclientescad->num_rows;

          }
          else
          {
            $clicadastrados = 01;
          }

      
      ?>

      <!-- Nº Clientes Excluidos diario -->

      <?php 
      
        $ndeclientesexcluidos = ("SELECT id_cliente FROM cliente WHERE id_usuario = '$idusuario' AND dt = '$datae' AND situacao = 'EXCLUIDO' ORDER BY id_cliente");

          if($nclientesexc = $conexao->query($ndeclientesexcluidos)) {
            $cliexcluidos = $nclientesexc->num_rows;

          }
          else
          {
            $cliexcluidos = 0100;
          }

      
      ?>


      <!-- Nº de produtos em estoque -->

      <?php

      $tdeclientescadastrados = ("SELECT id_cliente FROM cliente WHERE id_usuario = '$idusuario' ORDER BY id_cliente");

          if($tclientescad = $conexao->query($tdeclientescadastrados)) {
            $clitotal = $tclientescad->num_rows;

          }
          else
          {
            $clitotal = 01;
          }

          $clitotals = $clitotal - $cliexcluidos;
      
      ?>

                   <table id="customers">
  <tr>
    <th>Adicionados</th>
    <th>Excluídos</th>
    <th>Total de Clientes</th>
  
  </tr>
  <tr>
    <td><?php  printf("%d", $clicadastrados); ?></td>
    <td><?php  printf("%d", $cliexcluidos); ?></td>
    <td><?php  printf("%d", $clitotals); ?></td>
  
  </tr>
  
</table>
 
  
		</div>

    <div class="container">
      <H1>FORNECEDORES <?php echo $escolhida_date; ?></H1>  

       <!-- Nº Fornecedores cadastrados diario -->

      <?php 
      
        $ndefornecedorescadastrados = ("SELECT id_fornecedor FROM fornecedor WHERE id_usuario = '$idusuario' AND dt = '$datae' AND situacao = 'CADASTRADO' ORDER BY id_fornecedor");

          if($nfornecedorescad = $conexao->query($ndefornecedorescadastrados)) {
            $forncadastrados = $nfornecedorescad->num_rows;

          }
          else
          {
            $forncadastrados = 01;
          }

  
      ?>

      <!-- Nº Fornecedores Excluidos diario -->

      <?php 
      
        $ndefornecedoresexcluidos = ("SELECT id_fornecedor FROM fornecedor WHERE id_usuario = '$idusuario' AND dt = '$datae' AND situacao = 'EXCLUIDO' ORDER BY id_fornecedor");

          if($nfornecedoresexc = $conexao->query($ndefornecedoresexcluidos)) {
            $fornexcluidos = $nfornecedoresexc->num_rows;

          }
          else
          {
            $fornexcluidos = 01;
          }

      
      ?>


      <!-- Nº de produtos em estoque -->

      <?php
      
        $forntotal = $forncadastrados - $fornexcluidos;
      
      ?>

                 <table id="customers">
  <tr>
    <th>Cadastrados</th>
    <th>Excluídos</th>
    <th>Total de Fornecedores</th>
  
  </tr>
  <tr>
    <td><?php  printf("%d", $forncadastrados); ?></td>
    <td><?php  printf("%d", $fornexcluidos); ?></td>
    <td><?php  printf("%d", $forntotal); ?></td>
  
  </tr>
  
</table>
 
  
    </div>      			
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