<?php
class Usuarios{
	private $id;
	private $nome;
	private $usuario;
	private $senha;
	private $data_cadastro;
	private $permissao;
	
	public function _Usuarios($id, $nome, $usuario, $senha, $data_cadastro, $permissao){		
		$this->id				=$id;
		$this->nome				=$nome;
		$this->usuario			=$usuario;
		$this->senha			=$senha;
		$this->data_cadastro	=$data_cadastro;
		$this->permissao		=$permissao;
	}	
		
	public function get_id(){
		return $this->id;
	}
	public function set_id($novo){
		$this->id		=$novo;
	}
	
	public function get_nome(){
		return $this->nome;
	}
	public function set_nome($novo){
		$this->nome	=$novo;
	}
	
	public function get_usuario(){
		return $this->usuario;
	}
	public function set_usuario($novo){
		$this->usuario			=$novo;
	}

	public function get_senha(){
		return $this->senha;
	}
	public function set_senha($novo){
		$this->senha			=$novo;
	}

	public function get_data_cadastro(){
		return $this->data_cadastro;
	}
	public function set_data_cadastro($novo){
		$this->data_cadastro	=$novo;
	}

	public function get_permissao(){
		return $this->permissao;
	}
	public function set_permissao($novo){
		$this->permissao			=$novo;
	}	
}
?>