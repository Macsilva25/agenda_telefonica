<?php
class Modulos{
	private $id;
	private $descricao;
	
	public function _Modulos($id, $descricao){		
		$this->id				=$id;
		$this->descricao		=$descricao;
	}	
		
	public function get_id(){
		return $this->id;
	}
	public function set_id($novo){
		$this->id		=$novo;
	}
	
	public function get_descricao(){
		return $this->descricao;
	}
	public function set_descricao($novo){
		$this->descricao	=$novo;
	}
}
?>