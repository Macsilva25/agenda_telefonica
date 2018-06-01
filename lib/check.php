<?
session_start();
include_once "Conexao.php";

	include_once("../model/usuario.php");
	$Usuarios = new Usuarios();
	include_once("../controllers/ctrl_usuarios.php");
	$ctrl_Usuarios = new ctrl_Usuarios();

	$user = $_POST['login'];
	$pass = $_POST['senha'];
	
	$verificar = $ctrl_Usuarios->Autenticar($Usuarios, $user, $pass, $conn);
	$total = $verificar->RecordCount(); 
	
	$nome 		= $verificar->fields[1];		
	$usuario 	= $verificar->fields[2];
	$senha		= $verificar->fields[3];
	$permissao 	= $verificar->fields[5];	

if ($total > 0 && $user == $usuario && $pass == $senha && $permissao == "0" && $nome == "root"){
		include_once "sessoes.php";	
		header('Location: http://localhost/agenda/index.php');
	}else{		
		if ($total > 0 && $user == $usuario && $pass == $senha){
			include_once "sessoes.php";	
			header('Location: ../templates/inicio/inicio.php');
		}else{
			session_unset();
			header('Location: ../index.php');
		}
}
?>