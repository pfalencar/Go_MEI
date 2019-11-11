<?php

abstract class ModelPessoa{

	protected $nome_razaoSocial;
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
	
	public function getNome_razaoSocial(){
		return $this->nome_razaoSocial;
	}
	
	public function setNome_razaoSocial($nome){
		$this->$nome_razaoSocial = $nome;
	}	
	
	public function getCpf_cnpj(){
		return $this->cpf_cnpj;
	}
	
	public function setCpf_cnpj($cpfCnpj){
		$this->cpf_cnpj = $cpfCnpj;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setEmail($mail){
		$this->email = $mail;
	}
	
	public function getTelefoneFixo(){
		return $this->telefoneFixo;
	}
	
	public function setTelefoneFixo($telFixo){
		$this->telefoneFixo = $telFixo;
	}
	
	public function getCelular(){
		return $this->celular;
	}
	
	public function setCelular($cel){
		$this->celular = $cel;
	}
	
	public function getSexo(){
		return $this->sexo;
	}
	
	public function setSexo($sexo){
		$this->sexo = $sexo;
	}
	
	public function getRg(){
		return $this->rg;
	}
	
	public function setRg($rg){
		$this->rg = $rg;
	}	
	
	public function getNomePai(){
		return $this->nomePai;
	}
	
	public function setNomePai($nomeDoPai){
		$this->nomePai = $nomeDoPai;
	}
	
	public function getNomeMae(){
		return $this->nomeMae;
	}
	
	public function setNomeMae($nomeDaMae){
		$this->nomeMae = $nomeDaMae;
	}
	
	public function getLogradouro(){
		return $this->logradouro;
	}	
	
	public function setLogradouro($rua){
		$this->logradouro = $rua;
	}	
	
	public function getNumero(){
		return $this->numero;
	}
	
	public function setNumero($num){
		$this->numero = $num;
	}	
	
	public function getCep(){
		return $this->cep;
	}
	
	public function setCep($cep){
		$this->cep = $cep;
	}
	
	public function getBairro(){
		return $this->bairro;
	}

	public function setBairro($bairro){
		$this->bairro = $bairro;
	}
	
	public function getCidade(){
		return $this->cidade;
	}
	
	public function setCidade($cidade){
		$this->cidade = $cidade;
	}	
	
	public function getUf(){
		return $this->uf;
	}
	
	public function setUf($uf){
		$this->uf = $uf;
	}
	
}

?>