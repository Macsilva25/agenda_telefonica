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

	include_once("../../model/agenda.php");
	$Agenda = new Agenda();
	include_once("../../controllers/ctrl_agenda.php");
	$ctrl_Agenda = new ctrl_Agenda();
 
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
		$agenda = $ctrl_Agenda->Excluir($Agenda, $exc_registro, $conn);
		echo "<script> alert('Contato excluíddo com sucesso!')</script>";
		header('Location: listar_contatos.php?novo=1');
	}catch(Exception $ex){
		echo "<script> alert('".$ex->getMessage()."'); </script>";
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
			<h5 class="mb-0 text-white lh-100">Agenda - Consultar contatos</h5>
			<small>Hoje, <?=date("F j, Y, g:i a");?></small>
		</div>
	</div>
	<div class="my-3 p-3 bg-white rounded box-shadow">
		<h6 class="border-bottom border-gray pb-2 mb-0">
			<strong><h2>Consulta de contatos</h2></strong>
		</h6>
		<div class="table-responsive">
		<table  width="100%" align="center" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">	
		<form action="listar_contatos.php?consultar=sim" method="post">		
			<thead>
				<tr>
					<th width="25%">Nome </th>
					<th><input type="text" name="nome" placeholder="Informe um nome"></th>
				</tr>
				<tr>	
					<th width="9%">Telefone </th>
					<th><input type="text" name="telefone" placeholder="Informe um telefone"></th>
				</tr>
				<tr>	
					<th width="20%">E-mail </th>
					<th><input type="text" name="email" placeholder="Informe um email"></th>
				</tr>
				<tr>	
					<th width="10%">Data de nascimento </th>
					<th><input type="date" name="data_nascimento"></th>
				</tr>
				<tr>	
					<th width="25%">Endereço </th>
					<th><input type="text" name="endereco"  placeholder="Informe um endereco"></th>
				</tr>
				<tr>	
					<th colspan="2"><input type="submit" name="consultar" value="Consulta agenda"></th>
				</tr>
			</thead>
		</form>
		</table>
		</div>
	</div>
	<?	include_once "../../js/scripts_pagina.php";?> 
</body>
</html>