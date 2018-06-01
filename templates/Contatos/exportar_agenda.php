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

?>
<!doctype html>
<html>
<head>
<title>Agenda telefonica</title>
<?
	header("Content-type: application/msexcel");
	header("Content-Disposition: attachment; filename=Todos_os_Contaos_Agenda_Telefonica.xls");	
?>
</head>

<body leftmargin="0" topmargin="0" marginwidth="1" marginheight="1">
		<div class="table-responsive">
			<table border="1" width="100%" align="center" cellpadding="4" cellspacing="0">	
			<thead>			
				<tr>
					<th colspan="8" align="center">Dados Importados da Agenda Telefônica</strong></th>
				</tr>					
				<tr>
					<th width="1%">N </th>
					<th width="25%">Nome </th>
					<th width="9%">Telefone </th>
					<th width="20%">E-mail </th>
					<th width="10%">Data de nascimento </th>
					<th width="25%">Endereço </th>
				</tr>
			</thead>
			<tbody>
<? 
	$agenda 			= $ctrl_Agenda->Consultar($Agenda, $conn);
	$total_agenda 		= $agenda->RecordCount(); 			

	for ($i =0; $i < $total_agenda; $i++){
	$idcontato			= $agenda->fields[0];			
	$nome				= $agenda->fields[1];	
	$telefone			= ConverteTelefone($agenda->fields[2]);	
	$email				= $agenda->fields[3];	
	$data_nascimento	= ConverteData($agenda->fields[4]);	
	$endereco			= $agenda->fields[5];	
?>						
				<tr>
					<th><?=$i+1;?></th>
					<th><?=$nome;?></th>
					<th><?=$telefone;?></th>
					<th><?=$email;?></th>
					<th><?=$data_nascimento;?></th>
					<th><?=$endereco;?></th>
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
</body>
</html>