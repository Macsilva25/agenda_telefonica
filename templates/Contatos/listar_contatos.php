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
		$agenda = $ctrl_Agenda->Excluir($Agenda, $exc_registro, $conn);
		echo "<script> alert('Contato excluíddo com sucesso!')</script>";
		header('Location: listar_contatos.php?novo=1');
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
			<h5 class="mb-0 text-white lh-100">Agenda - Listagem de contatos</h5>
			<small>Hoje, <?=date("F j, Y, g:i a");?></small>
		</div>
	</div>
	<div class="my-3 p-3 bg-white rounded box-shadow">
		<h6 class="border-bottom border-gray pb-2 mb-0">
			<strong><h2>Lista de contatos</h2></strong>
		</h6>
		<? if (!empty($novo_cadastro)){?>
			<h5><a href="cadastrar_contato.php">Cadastrar novo contato na agenda</a></h5>
		<? }?>
		<? if(!empty($consulta)){?>
			<h5><a href="consultar_contato.php">Nova consulta</a></h5>
		<? }?>
		<div class="table-responsive">
			<table  width="100%" align="center" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">	
			<thead>
				<tr>
					<th width="1%">Nº </th>
					<th width="25%">Nome </th>
					<th width="9%">Telefone </th>
					<th width="20%">E-mail </th>
					<th width="10%">Data de nascimento </th>
					<th width="25%">Endereço </th>
					<th width="5%">Editar </th>
					<th width="5%">Remover </th>
				</tr>
			</thead>
			<tbody>
<? 
if(!empty($consulta)){		
//Consultar
	$Agenda->set_nome				($_POST['nome']);
	$Agenda->set_telefone			($_POST['telefone']);
	$Agenda->set_email				($_POST['email']);
	$Agenda->set_data_nascimento	($_POST['data_nascimento']);
	$Agenda->set_endereco			($_POST['endereco']);

	$agenda 			= $ctrl_Agenda->Consultar($Agenda, $conn);
	$total_agenda 		= $agenda->RecordCount(); 		
}else{
	$agenda 			= $ctrl_Agenda->Consultar($Agenda, $conn);
	$total_agenda 		= $agenda->RecordCount(); 			
}
	for ($i =0; $i < $total_agenda; $i++){
	$idcontato			= $agenda->fields[0];			
	$nome				= $agenda->fields[1];	
	$telefone			= ConverteTelefone($agenda->fields[2]);	
	$email				= $agenda->fields[3];	
	$data_nascimento	= ConverteData($agenda->fields[4]);	
	$endereco			= $agenda->fields[5];	
?>						
				<tr>
					<td><?=$i+1;?></td>
					<td><?=$nome;?></td>
					<td><?=$telefone;?></td>
					<td><?=$email;?></td>
					<td><?=$data_nascimento;?></td>
					<td><?=$endereco;?></td>
					<th><a href="editar_contato.php?id=<?=$idcontato;?>">Editar</a></th>
					<th><a href="<?=$_SERVER['PHP_SELF']?>?id=<?=$idcontato;?>">Remover</a></th>
				</tr>
<?
	$agenda->MoveNext();
}
?>							
			</tbody>
				<tr>
					<td colspan="8">Total de Contatos: <strong><?=$total_agenda;?></strong></td>
				</tr>
			</table>
		</div>
	</div>
	<?	include_once "../../js/scripts_pagina.php";?> 
</body>
</html>