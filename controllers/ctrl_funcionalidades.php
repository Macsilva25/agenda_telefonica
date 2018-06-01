<?php
class ctrl_Funcionalidades extends Exception{	
	
	public function _ctrl_Funcionalidades(){}
	
	public function Listar($Funcionalidades, $id_modulo, $conexao){
		try{
			$id				=$Funcionalidades->get_id();
			$idmodulo		=$Funcionalidades->get_idmodulo();
			$descricao		=$Funcionalidades->get_descricao();
			$url			=$Funcionalidades->get_url();
			
 		$sql="
				Select 
					descricao, url 
				from 
					adm_funcionalidades 
				where 
					id_modulo = '$id_modulo'
				order by 
					descricao asc";
			return $conexao->Execute($sql);
			return null;			
		}catch(Exception $ex){
			throw new Exception($ex->getMessage());
		}
	}			

}
?>