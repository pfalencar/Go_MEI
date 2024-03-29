<?php
session_start();
include("Conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">  
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
<link rel="stylesheet" type="text/css" href="styles/table.css"/>
<link rel="stylesheet" type="text/css" href="styles/search.css"/>
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
  <h1>Aquisições</h1>
 <p><b>O cadastro de compras traz eficiência na apuração dos dados, diminuindo erros e falhas no controle, e traz também agilidade, na hora da contabilização. Efetue agora o cadastro de uma nova aquisição! </b></p><br>
 <a href="CadCompra.php" class="button"><b>+ Adicionar</b></a>
 <hr>

 <?php
      if( isset($_SESSION['msg']) ) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        }
      ?>

 <p><b>Localize, Edite informações ou Exclua uma aquisição!</b></p>

 <form action="" method="POST">     

      <p><input type=text name=descricaoCompra placeholder="Digite a descrição da compra" size="100" >
      <button type="submit"class="button" name="SendPesqUser" value="Pesquisar"><b>Pesquisar</b></button></p>  

    </form> <br>

    <?php
      //recebendo o botão
        $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

      //verificando se clicou no botao
        if ($SendPesqUser) {
            $descricaoCompra = filter_input(INPUT_POST,'descricaoCompra', FILTER_SANITIZE_STRING);
          $result_compra = "SELECT * FROM compra WHERE descricaocompra LIKE '%$descricaoCompra%'";
            $resultado_compra = mysqli_query($conexao, $result_compra);
    ?>

    <table id="customers">
        <tr>
          <th>Id Compra</th>
          <th>Descrição</th>
          <th>Data</th>
          <th>Valor</th> 
          <th></th>
          <th></th>           
        </tr>

          <?php

            while( $row_compra = mysqli_fetch_assoc($resultado_compra) ) {
    
            echo 
              "<tr>
                <td>" . $row_compra['id_compra'] . "</td>
                <td>" . $row_compra['descricaocompra'] . "</td>
                <td>" . $row_compra['dt'] . "</td>
                <td>" . $row_compra['valorcompra'] . "</td>
                <td><a href='edit_compra.php?id=" . $row_compra['id_compra'] . "'>Editar</a></td>
                <td><a href='proc_apagar_compra.php?id=" . $row_compra['id_compra'] . "'>Apagar</a></td>
              </tr>";
            }
        }
        
          ?>
    
      </table>
        <br><br>
        <br><br>

        <div class="footer">
  <p>Copyright © 2019 Go! MEI</p>
</div>

</body>
</html>