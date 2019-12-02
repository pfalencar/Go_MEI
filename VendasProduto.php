<?php
session_start();
include_once("Conexao.php");
?>

<!DOCTYPE html>
<html>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/styles.css"/>
    <link rel="stylesheet" type="text/css" href="styles/forms.css"/>
    <link rel="stylesheet" type="text/css" href="styles/logo.css"/>
    <link rel="stylesheet" type="text/css" href="styles/table.css"/>
  </head>

  <body>
    <div class="header">
      <div class="conexao"><a  href="Telaprincipal.html"><b>Voltar</b></a></div>    	
      <a class="logo" href="Telaprincipal.html"><h1>Go! MEI - Venda de Produto</h1></a>      
    </div>
    <?php
      if( isset($_SESSION['msg']) ) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
    ?>
    <div class="row">

      <div class="col-3 col-s-3 menu">      
      <h2>1 - Selecione os itens:</h2>

        <form action="/action_page.php">
          <div class="container">  

            <?php
              $idusuario = $_SESSION['id_usuario'];
              $result_estoque = "SELECT * FROM estoque WHERE id_usuario ='$idusuario'";
              $resultado_estoque = mysqli_query($conexao, $result_estoque);   
            ?>

            <label for="descricaoproduto"><b>Descrição do Produto</b></label>
            <select name="descricaoproduto" required>

            <?php
              while ($row_estoque = mysqli_fetch_assoc($resultado_estoque)) {
                $idestoque = $row_estoque['id_estoque'];
                $descricaoestoque = $row_estoque['descricaoEstoque'];
                $preco = $row_estoque['preco'];
                echo "
                     <option value= ". $idestoque .">". $descricaoestoque ."</option>;
                ";
               }
            ?>

            </select>       
            <br>
          	
            <label for="valorunitario"><b>Valor Unitário</b></label>
            <?php
              $precoestoqueselec = filter_input(INPUT_POST, '$idestoque', FILTER_SANITIZE_STRING);
              $result_estoque = "SELECT * FROM estoque WHERE id_estoque ='$idestoque'";
              $resultado_estoque = mysqli_query($conexao, $result_estoque);
              $row_estoque = mysqli_fetch_assoc($resultado_estoque);          
            ?>

            <input type="text" name="valorunitario" value="<?php echo $row_estoque['preco']; ?>" required></p>
       	
            <label for="quantidade"><b>Quantidade</b></label>
            <input type="text"  name="quantidade" required>	

          	<button type="submit" class="registerbtn">Adicionar Item</button>
          </div> 
        </form>  

      </div>


      <div class="col-6 col-s-9">

        <h2>2 - Confirme os Dados:</h2>
    	  <p><b>Cliente</b></p>

    	  <form action="/action_page.php">
      	  <div class="container">  

          <?php 
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
          ?>

          <?php
            $idusuario = $_SESSION['id_usuario'];     
            $result_cliente = "SELECT * FROM cliente WHERE id_usuario ='$idusuario'";
            $resultado_cliente = mysqli_query($conexao, $result_cliente);   
          ?>

          <label for="nomecliente"><b>Nome do cliente</b></label>
          <select name="nomecliente" required> 

          <?php
            while ($row_cliente = mysqli_fetch_assoc($resultado_cliente)) {
              echo "
                   <option value= ". $row_cliente['id_cliente'] .">". $row_cliente['nome'] ."</option>;
              ";
             }
          ?>

          </select>       
          <br>
    		
      	  </div>
        </form>
    	 
        <p><b>Produtos</b></p>
        <table id="customers">
          <tr>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Valor</th>
          </tr>
          <tr>
            <td>Alfreds Futterkiste</td>
            <td>Maria Anders</td>
            <td>Germany</td>
          </tr>
          <tr>
            <td>Berglunds snabbköp</td>
            <td>Christina Berglund</td>
            <td>Sweden</td>
          </tr>
          <tr>
            <td>Centro comercial Moctezuma</td>
            <td>Francisco Chang</td>
            <td>Mexico</td>
          </tr>
          <tr>
            <td>Ernst Handel</td>
            <td>Roland Mendel</td>
            <td>Austria</td>
          </tr>
          <tr>
            <td>Island Trading</td>
            <td>Helen Bennett</td>
            <td>UK</td>
          </tr>
        </table>
        
      </div>

      <div class="col-3 col-s-12">
        <h2>3 - Finalize a Venda:</h2>

        <div class="aside">
      		<label for="finalizadora"><b>Finalizadora</b></label>
      		  <select>
      			  <option value="dinheiro"><b>Dinheiro</b></option>
      			  <option value="cartao"><b>Cartão</b></option>
      		  </select>
      	  
      		<label for="valortotal"><b>Valor Total</b></label>
      		<input type="text" placeholder="" name="valortotal" required>
      	
          <button type="submit" class="registerbtnDois"><b>Registrar Venda</b></button>
        </div>

      </div>

    </div>

    <div class="footer">
      <p>Copyright © 2019 Go! MEI</p>
    </div>

  </body>

</html>