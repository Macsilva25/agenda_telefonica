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
 
if (empty($_GET['id'])){
	 $_GET['id'] = "";
}else{
	$idcontato = $_GET['id'];	
	$agenda				= $ctrl_Agenda->Listar_dados_edicao($Agenda,$idcontato, $conn);
	$total_agenda 		= $agenda->RecordCount();
	
	$Nome 				= $agenda->fields[1];
	$Telefone			= $agenda->fields[2];	
	$Email				= $agenda->fields[3];	
	$Data_nascimento	= $agenda->fields[4];	
	$Endereco 			= $agenda->fields[5];
}
	
	if(isset($_POST['salvar'])){		
	//Editar		
		$Agenda->set_nome				($_POST['nome']);
		$Agenda->set_telefone			($_POST['ddd'].$_POST['telefone']);
		$Agenda->set_email				($_POST['email']);
		$Agenda->set_data_nascimento	($_POST['data_nascimento']);
		$Agenda->set_endereco			($_POST['endereco']);
		
		try{			
			$id = $ctrl_Agenda->Editar($Agenda, $idcontato, $conn);				
				echo "<script> alert('Contato editado com sucesso!')</script>";
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
			<h5 class="mb-0 text-white lh-100">Agenda - Edição de contatos</h5>
			<small>Hoje, <?=date("F j, Y, g:i a");?></small>
		</div>
	</div>
	<div class="my-3 p-3 bg-white rounded box-shadow">
		<h6 class="border-bottom border-gray pb-2 mb-0">
			<strong><h2>Editar contato</h2></strong>
		</h6>
<div class="table-responsive">
<table width="100%" align="center" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
<form action="" method="post">
<tbody>
    <tr>
        <th>Nome:</th>
		<th><input type="text" name="nome" value="<?=$Nome?>" placeholder="Nome do contato" title="Informe o nome completo do contato."></th>
		<th>Telefone:</th>
		<th><input type="text" size="1" placeholder="Ex:81" minlength="2" maxlength="2" name="ddd" required value="<?=substr($Telefone,0,2);?>"><input type="text" minlength="8" maxlength="9" name="telefone" placeholder="Ex: 988888888" title="Indorme o telefone do contato" required value="<?=substr($Telefone,2,9)?>"></th>
		<th>Email:</th>
		<th><input type="text" name="email" placeholder="Ex: contato@contato.com" title="Informe o email do contato." required value="<?=$Email;?>"></th>
	</tr>
    <tr>
        <th>Data de nascimento:</th>
		<th><input type="text" name="data_nascimento" placeholder="Ex: <?=date('d/m/Y');?>" title="Informe a data de nascimento do contato." required value="<?=DesConverteData($Data_nascimento);?>"></th>
		<th>Endereço:</th>
		<th><input type="text" name="endereco" placeholder="Endereço" title="Informe o endereço do contato." required value="<?=$Endereco;?>"></th>
		<th colspan="2"></th>
	</tr>	
<tr>
    <th colspan="6"><input type="submit" name="salvar" value="Editar Contato"></th>
</tr>
</tbody>
</form>
</table>
		
	</div>
	<?	include_once "../../js/scripts_pagina.php";?> 
</body>
</html>