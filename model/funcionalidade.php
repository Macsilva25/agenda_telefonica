<?php
class Funcionalidades{
	private $id;
	private $idmodulo;
	private $descricao;
	private $url;
	
	public function _Funcionalidades($id, $idmodulo, $descricao, $url){		
		$this->id				=$id;
		$this->idmodulo			=$idmodulo;
		$this->descricao		=$descricao;
		$this->url				=$url;
	}	
		
	public function get_id(){
		return $this->id;
	}
	public function set_id($novo){
		$this->id		=$novo;
	}

	public function get_idmodulo(){
		return $this->idmodulo;
	}
	public function set_idmodulo($novo){
		$this->idmodulo		=$novo;
	}	
	
	public function get_descricao(){
		return $this->descricao;
	}
	public function set_descricao($novo){
		$this->descricao	=$novo;
	}
	
	public function get_url(){
		return $this->url;
	}
	public function set_url($novo){
		$this->url		=$novo;
	}	
	
}
?>