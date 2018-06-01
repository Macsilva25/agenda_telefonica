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
	
	$pagina = 0;
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
			<h5 class="mb-0 text-white lh-100">Agenda - Início</h5>
			<small>Hoje, <?=date("F j, Y, g:i a");?></small>
		</div>
	</div>
	<div class="my-3 p-3 bg-white rounded box-shadow">
		<h6 class="border-bottom border-gray pb-2 mb-0">
			<strong><h2>Bem-vindo, <?=$_SESSION['Nome'];?></h2></strong>
		</h6>
	</div>
	<?	include_once "../../js/scripts_pagina.php";?> 
</body>
</html>