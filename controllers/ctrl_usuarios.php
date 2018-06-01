<?php
class ctrl_Usuarios extends Exception{	
	
	public function _ctrl_Usuarios(){}
	
	public function Adicionar($Usuarios,$conexao){
		try{
			$id				=$Usuarios->get_id();
			$nome			=$Usuarios->get_nome();
			$usuario		=$Usuarios->get_usuario();
			$senha			=$Usuarios->get_senha();
			$data_cadastro	=$Usuarios->get_data_cadastro();
			$permissao		=$Usuarios->get_permissao();
			
			if(strlen($nome)==0){
				throw new Exception(iconv("UTF-8","ISO-8859-1","Informe o nome!"));
			}

		$sql="	insert into adm_usuarios(
						nome, usuario, senha, data_cadastro, permissao
					)values(
						'$nome','$usuario','$senha',now(),'$permissao')";						 
					
			$query	=	$conexao->Execute($sql);
			return $conexao->Insert_ID($query);
		}catch(Exception $ex){
			throw new Exception($ex->getMessage());
		}		
	}			

	public function Editar($Usuarios, $id, $conexao){
		try{
			$nome			=$Usuarios->get_nome();
			$usuario		=$Usuarios->get_usuario();
			$senha			=$Usuarios->get_senha();
			$data_cadastro	=$Usuarios->get_data_cadastro();
			$permissao		=$Usuarios->get_permissao();
			
	$sql="update 
			adm_usuarios
		set 
			nome='$nome', usuario='$usuario', senha='$senha', permissao='$permissao' 
		where 
			id = '$id' ";						 

		$query	=	$conexao->Execute($sql);
			return $conexao->Insert_ID($query);
		}catch(Exception $ex){
			throw new Exception($ex->getMessage());
		}		
	}
	
	public function Listar($Usuarios, $conexao){
		try{
			$id				=$Usuarios->get_id();
			$nome			=$Usuarios->get_nome();
			$usuario		=$Usuarios->get_usuario();
			$senha			=$Usuarios->get_senha();
			$data_cadastro	=$Usuarios->get_data_cadastro();
			$permissao		=$Usuarios->get_permissao();
			
		$sql="
			select
				id,	nome, usuario, senha, data_cadastro, permissao
			from
				adm_usuarios";
				
			return $conexao->Execute($sql);
			return null;			
		}catch(Exception $ex){
			throw new Exception($ex->getMessage());
		}
	}			

	public function Excluir($Usuarios, $idusuario, $conexao){
		try{
 		$sql="
			DELETE FROM 
				adm_usuarios
			where
				id = '$idusuario'	";
				
			return $conexao->Execute($sql);
			return null;			
		}catch(Exception $ex){
			throw new Exception($ex->getMessage());
		}
	}				

	public function Autenticar($Usuarios,$user, $pass, $conexao){
		try{
			$id				=$Usuarios->get_id();
			$nome			=$Usuarios->get_nome();
			$usuario		=$Usuarios->get_usuario();
			$senha			=$Usuarios->get_senha();
			$data_cadastro	=$Usuarios->get_data_cadastro();
			$permissao		=$Usuarios->get_permissao();
			
		$sql="
			select
				id,	nome, usuario, senha, data_cadastro, permissao
			from
				adm_usuarios
			where 
				usuario = '$user'
				and senha = '$pass'";
				
			return $conexao->Execute($sql);
			return null;			
		}catch(Exception $ex){
			throw new Exception($ex->getMessage());
		}
	}		
	
	public function Checar_duplicidade($Usuarios, $conexao){
		try{
			$id				=$Usuarios->get_id();
			$nome			=$Usuarios->get_nome();
			$usuario		=$Usuarios->get_usuario();
			$senha			=$Usuarios->get_senha();
			$data_cadastro	=$Usuarios->get_data_cadastro();
			$permissao		=$Usuarios->get_permissao();
			
 		$sql="
			SELECT 
				usuario
			FROM 
				adm_usuarios
			where
				usuario = '$usuario'";
				
			return $conexao->Execute($sql);
			return null;			
		}catch(Exception $ex){
			throw new Exception($ex->getMessage());
		}
	}			

	public function Listar_dados_edicao($Usuarios, $idusuario, $conexao){
		try{
 		$sql="
			SELECT 
				nome, usuario, senha, permissao
			FROM 
				adm_usuarios
			where
				id = '$idusuario'	";
				
			return $conexao->Execute($sql);
			return null;			
		}catch(Exception $ex){
			throw new Exception($ex->getMessage());
		}
	}				
	
}
?>