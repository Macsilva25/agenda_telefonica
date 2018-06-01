<?	
	session_start();
	include_once "../../lib/Conexao.php";
	
	include_once("../../model/modulo.php");
	$Modulos = new Modulos();
	include_once("../../controllers/ctrl_modulos.php");
	$ctrl_Modulos = new ctrl_Modulos();

	include_once("../../model/funcionalidade.php");
	$Funcionalidades = new Funcionalidades();
	include_once("../../controllers/ctrl_funcionalidades.php");
	$ctrl_Funcionalidades = new ctrl_Funcionalidades();

	include_once("../../model/usuario.php");
	$Usuarios = new Usuarios();
	include_once("../../controllers/ctrl_usuarios.php");
	$ctrl_Usuarios = new ctrl_Usuarios();

	include_once("../../lib/functions/funcoes.php");
	

if (empty($_GET['novo'])){
	 $_GET['novo'] = "";
}else{
	$novo_cadastro = $_GET['novo'];	
}
if (empty($_GET['id'])){
	 $_GET['id'] = "";
}else{
	$exc_registro = $_GET['id'];	
	try{			
		$usuario = $ctrl_Usuarios->Excluir($Usuarios, $exc_registro, $conn);
		echo "<script> alert('Usuário excluíddo com sucesso!')</script>";
		header('Location: listar_usuarios.php?novo=1');
	}catch(Exception $ex){
		echo "<script> alert('".$ex->getMessage()."'); </script>";
	}
}

if (empty($_GET['consultar'])){
	$_GET['consultar'] = "";
}else{
	if ($_GET['consultar'] == "sim"){
		$consulta = $_GET['consultar'];
	}
}

?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Agenda telefonica</title>
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/offcanvas.css">
	</head>
<body class="bg-light">
	<?	include_once "../../includes/menu.php";?>   
	<div class="d-flex align-items-center p-3 my-0 text-white-50 bg-purple rounded box-shadow">
		<div class="lh-100">
			<h5 class="mb-0 text-white lh-100">Agenda - Listagem de usuários</h5>
			<small>Hoje, <?=date("F j, Y, g:i a");?></small>
		</div>
	</div>
	<div class="my-3 p-3 bg-white rounded box-shadow">
		<h6 class="border-bottom border-gray pb-2 mb-0">
			<strong><h2>Lista de usuários</h2></strong>
		</h6>
		<? if (!empty($novo_cadastro)){?>
			<h5><a href="cadastrar_usuario.php">Cadastrar novo usuário</a></h5>
		<? }?>
		<? if(!empty($consulta)){?>
			<h5><a href="consultar_usuario.php">Nova consulta</a></h5>
		<? }?>
		<div class="table-responsive">
			<table  width="100%" align="center" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">	
			<thead>
				<tr>
					<th width="1%">Nº </th>
					<th width="25%">Nome </th>
					<th width="9%">Usuário </th>
					<th width="10%">Data de Cadastro </th>
					<th width="25%">Permissão </th>
					<th width="5%">Editar </th>
					<th width="5%">Remover </th>
				</tr>
			</thead>
			<tbody>
<? 
if(!empty($consulta)){		
//Consultar
	$Usuarios->set_nome				($_POST['nome']);
	$Usuarios->set_usuario			($_POST['usuario']);
	$Usuarios->set_data_cadastro	($_POST['data_cadastro']);
	$Usuarios->set_permissao		($_POST['permissao']);

	$usuarios 			= $ctrl_Usuarios->Consultar($Usuarios, $conn);
	$total_usuario 		= $usuarios->RecordCount(); 		
}else{
	$usuarios 			= $ctrl_Usuarios->Listar($Usuarios, $conn);
	$total_usuario 		= $usuarios->RecordCount(); 			
}
	for ($i =0; $i < $total_usuario; $i++){
		$idusuario			= $usuarios->fields[0];			
		$nome				= $usuarios->fields[1];	
		$usuario			= $usuarios->fields[2];	
		$data_cadastro		= ConverteData($usuarios->fields[4]);	
		$permissao			= $usuarios->fields[5];	
		
		switch($permissao){
			case 0: 
					$permissao = "Administrador";
				break;
			case 1: 
					$permissao = "Convidado";
				break;
			case 2: 
					$permissao = "Usuario";
				break;
			
			default: echo "";
		}
?>						
				<tr>
					<td><?=$i+1;?></td>
					<td><?=$nome;?></td>
					<td><?=$usuario;?></td>
					<td><?=$data_cadastro;?></td>
					<td><?=$permissao;?></td>
					<th><a href="editar_usuario.php?id=<?=$idusuario;?>">Editar</a></th>
					<th><a href="<?=$_SERVER['PHP_SELF']?>?id=<?=$idusuario;?>">Remover</a></th>
				</tr>
<?
	$usuarios->MoveNext();
}
?>							
			</tbody>
				<tr>
					<td colspan="7">Total de Contatos: <strong><?=$total_usuario;?></strong></td>
				</tr>
			</table>
		</div>
	</div>
	<?	include_once "../../js/scripts_pagina.php";?> 
</body>
</html>