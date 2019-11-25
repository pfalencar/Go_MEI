<?php
session_start();
include_once("Conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
$rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
$nomemae = filter_input(INPUT_POST, 'nomemae', FILTER_SANITIZE_STRING);
$nomepai = filter_input(INPUT_POST, 'nomepai', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$logradouro = filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
$ctps = filter_input(INPUT_POST, 'ctps', FILTER_SANITIZE_STRING);
$pispasep = filter_input(INPUT_POST, 'pispasep', FILTER_SANITIZE_STRING);
$numeroconta = filter_input(INPUT_POST, 'numeroconta', FILTER_SANITIZE_STRING);
$tipoconta = filter_input(INPUT_POST, 'tipoconta', FILTER_SANITIZE_STRING);
$nomebanco = filter_input(INPUT_POST, 'nomebanco', FILTER_SANITIZE_STRING);
$agenciabancaria = filter_input(INPUT_POST, 'agenciabancaria', FILTER_SANITIZE_STRING);

/*
echo "nome: $nome <br>";
echo "cpf: $cpf <br>";
echo "email: $email <br>";
echo "telefone: $telefone <br>";
echo "celular: $celular <br>";
echo "sexo: $sexo <br>";
echo "rg: $rg <br>";
echo "nomemae: $nomemae <br>";
echo "nomepai: $nomepai <br>";
echo "cep: $cep <br>";
echo "logradouro: $logradouro <br>";
echo "numero: $numero <br>";
echo "bairro: $bairro <br>";
echo "cidade: $cidade <br>";
echo "uf: $uf <br>";
echo "ctps: $ctps <br>";
echo "pispasep: $pispasep <br>";
echo "numeroconta: $numeroconta <br>";
echo "tipoconta: $tipoconta <br>";
echo "nomebanco: $nomebanco <br>";
echo "agenciabancaria: $agenciabancaria <br>";
*/


$result_funcionario = "INSERT INTO funcionario (nome, cpf, email, tel, cel, sexo, rg, nome_mae, nome_pai, cep, logradouro, numero, bairro, cidade, uf, ctps, pispasep, numeroconta, tipoconta, nomebanco, agenciabancaria) VALUES ('$nome', '$cpf', '$email', '$telefone', '$celular', '$sexo', '$rg', '$nomemae', '$nomepai', '$cep', '$logradouro', '$numero', '$bairro', '$cidade', '$uf', '$ctps', '$pispasep', '$numeroconta', '$tipoconta', '$nomebanco', '$agenciabancaria')";

$resultado_funcionario = mysqli_query($conexao, $result_funcionario);

if (mysqli_insert_id($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Funcionário cadastrado com sucesso!</p>";
	header("Location:CadFuncionario.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Funcionário não foi cadastrado com sucesso.</p>";
	header("Location:CadFuncionario.php");
}


?>