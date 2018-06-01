<?php
class Agenda{
	private $idcontato;
	private $nome;
	private $telefone;
	private $email;
	private $data_nascimento;
	private $endereco;
	
	public function _Agenda($idcontato, $nome, $telefone, $email, $data_nascimento, $endereco){		
		$this->idcontato		=$idcontato;
		$this->nome				=$nome;
		$this->telefone			=$telefone;
		$this->email			=$email;
		$this->data_nascimento	=$data_nascimento;
		$this->endereco			=$endereco;
	}	
		
	public function get_idcontato(){
		return $this->idcontato;
	}
	public function set_idcontato($novo){
		$this->idcontato		=$novo;
	}
	
	public function get_nome(){
		return $this->nome;
	}
	public function set_nome($novo){
		$this->nome				=$novo;
	}
	
	public function get_telefone(){
		return $this->telefone;
	}
	public function set_telefone($novo){
		$this->telefone			=$novo;
	}

	public function get_email(){
		return $this->email;
	}
	public function set_email($novo){
		$this->email			=$novo;
	}

	public function get_data_nascimento(){
		return $this->data_nascimento;
	}
	public function set_data_nascimento($novo){
		$this->data_nascimento	=$novo;
	}

	public function get_endereco(){
		return $this->endereco;
	}
	public function set_endereco($novo){
		$this->endereco			=$novo;
	}	
}
?>