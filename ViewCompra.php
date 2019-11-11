<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  	<form action="ControllerCompra.php" method="POST">
  		<h2>Cadastro da Compra</h2>	

				<?php
			  	if (isset($_SESSION['status_cadastro'])):
			  ?>	  
			    <div>
					  <p>Cadastro efetuado com sucesso!<br>Voltar para a <a href="painel.php">Página Inicial</a></p>
					</div>			
			  <?php
			    endif;
					unset($_SESSION['status_cadastro']);
			  ?> 	
		  
			  <?php
			  	if (isset($_SESSION['usuario_existe'])):
			  ?>		  
					<div style="color: red">
					  <p> Este CNPJ já existe! Informe outro e tente novamente.</p>
					</div>
			  <?php
			    endif;
					unset($_SESSION['usuario_existe']);
			  ?>	

		  <p>Código da Compra: <input type=text name=codCompra></p><br>
		  <p>Código do Fornecedor: <input type=text name=codFornecedor></p><br>
		  <p>Código do MEI: <input type=text name=codMei></p><br>
		  <p>Descrição da Compra: <input type=text name=descricaoCompra></p>
		  <p>Data da Compra: <input type=text name=dtCompra></p>
		  <p>Valor da Compra: <input type=text name=valorCompra></p>
	  	<br>
	    <button type="submit">Salvar </button>
			<br>
	
		</form>
  </body>

</html>


   <!-- nome_razaoSocial;
	protected $cpf_cnpj;
	protected $email;
	protected $telefoneFixo;
	protected $celular;
	protected $sexo;
	protected $rg;
	protected $nomePai;
	protected $nomeMae;
	protected $logradouro;
	protected $numero;
	protected $cep;
	protected $bairro;
	protected $cidade;
	protected $uf;
	$codMei;
	private $senha;
	private $ocupacaoPrincipal = "Cabeleireira";
	private $ocupacaoSecundaria;
	-->