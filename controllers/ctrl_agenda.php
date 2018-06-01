<?php
class ctrl_Agenda extends Exception{
	
	public function _ctrl_Agenda(){}
	
	public function Adicionar($Agenda,$conexao){
		try{
			$nome				=	$Agenda->get_nome();			
			$telefone			=	$Agenda->get_telefone();			
			$email				=	$Agenda->get_email();			
			$data_nascimento	=	$Agenda->get_data_nascimento();			
			$endereco			=	$Agenda->get_endereco();			
			
			if(strlen($nome)==0){
				throw new Exception(iconv("UTF-8","ISO-8859-1","Informe o nome!"));
			}

		$sql="	insert into agenda_telefonica(
						nome, telefone, email, data_nascimento, endereco
					)values(
						'$nome','$telefone','$email','$data_nascimento','$endereco'
					)";						 
			$query	=	$conexao->Execute($sql);
			return $conexao->Insert_ID($query);
		}catch(Exception $ex){
			throw new Exception($ex->getMessage());
		}		
	}
	
	public function Listar($Agenda, $conexao){
		try{
			$idcontato		=$Agenda->get_idcontato();
			$nome			=$Agenda->get_nome();
			$telefone		=$Agenda->get_telefone();
			$email			=$Agenda->get_email();
			$endereco		=$Agenda->get_endereco();
			
 		$sql="
			SELECT 
				id, nome, telefone, email, data_nascimento, endereco
			FROM 
				agenda_telefonica";
			return $conexao->Execute($sql);
			return null;			
		}catch(Exception $ex){
			throw new Exception($ex->getMessage());
		}
	}			

	public function Consultar($Agenda, $conexao){
		try{
			$idcontato		=$Agenda->get_idcontato();
			$nome			=$Agenda->get_nome();
			$telefone		=$Agenda->get_telefone();
			$email			=$Agenda->get_email();
			$data_nascimento=$Agenda->get_data_nascimento();
			$endereco		=$Agenda->get_endereco();
			
 		$sql="
			SELECT 
				id, nome, telefone, email, data_nascimento, endereco
			FROM 
				agenda_telefonica
			WHERE
				nome like '%$nome%'
				and telefone like '%$telefone%'
				and email like '%$email%'
				and data_nascimento like '%$data_nascimento%'
				and endereco like '%$endereco%'
				";
			return $conexao->Execute($sql);
			return null;			
		}catch(Exception $ex){
			throw new Exception($ex->getMessage());
		}
	}			
	
	public function Editar($Agenda, $id, $conexao){
		try{
			$nome				=	$Agenda->get_nome();			
			$telefone			=	$Agenda->get_telefone();			
			$email				=	$Agenda->get_email();			
			$data_nascimento	=	$Agenda->get_data_nascimento();			
			$endereco			=	$Agenda->get_endereco();			
			
		$sql="	
		update 
			agenda_telefonica 
		set 
			nome='$nome', telefone='$telefone', email='$email', data_nascimento='$data_nascimento', endereco='$endereco' 
		where 
			id = '$id' ";						 
	
		$query	=	$conexao->Execute($sql);
			return $conexao->Insert_ID($query);
		}catch(Exception $ex){
			throw new Exception($ex->getMessage());
		}		
	}
		
	public function Checar_duplicidade($Agenda, $conexao){
		try{
			$idcontato		=$Agenda->get_idcontato();
			$nome			=$Agenda->get_nome();
			$telefone		=$Agenda->get_telefone();
			$email			=$Agenda->get_email();
			$endereco		=$Agenda->get_endereco();
			
 		$sql="
			SELECT 
				id, nome, telefone, email, data_nascimento, endereco
			FROM 
				agenda_telefonica
			where
				telefone = '$telefone'
				";
			return $conexao->Execute($sql);
			return null;			
		}catch(Exception $ex){
			throw new Exception($ex->getMessage());
		}
	}			
	
	public function Listar_dados_edicao($Agenda, $idcontato, $conexao){
		try{
 		$sql="
			SELECT 
				id, nome, telefone, email, data_nascimento, endereco
			FROM 
				agenda_telefonica
			where
				id = '$idcontato'
				";
			return $conexao->Execute($sql);
			return null;			
		}catch(Exception $ex){
			throw new Exception($ex->getMessage());
		}
	}				
	
	public function Excluir($Agenda, $idcontato, $conexao){
		try{
 		$sql="
			DELETE FROM 
				agenda_telefonica
			where
				id = '$idcontato'	";
			return $conexao->Execute($sql);
			return null;			
		}catch(Exception $ex){
			throw new Exception($ex->getMessage());
		}
	}				
	
}
?>