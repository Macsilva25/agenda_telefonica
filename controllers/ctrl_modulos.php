<?php
class ctrl_Modulos extends Exception{	
	
	public function _ctrl_Modulos(){}
	
	public function Listar($Modulos,$conexao){
		try{
			$id				=$Modulos->get_id();
			$descricao		=$Modulos->get_descricao();
			
 		$sql="
			select
				id,	descricao
			from
				adm_modulos	
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