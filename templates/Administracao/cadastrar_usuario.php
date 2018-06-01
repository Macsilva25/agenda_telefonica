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

	
if(isset($_POST['salvar'])){		
	
	//Cadastrar		
		$Usuarios->set_nome				($_POST['nome']);
		$Usuarios->set_usuario			($_POST['usuario']);
		$Usuarios->set_senha			($_POST['senha']);
		$Usuarios->set_permissao		($_POST['permissao']);

	if ($_POST['permissao'] == ""){
		echo "<script> alert('Por favor, escolha uma permissão!')</script>"; 		
	}else{		
		$usuarios			= $ctrl_Usuarios->Checar_duplicidade($Usuarios, $conn);
		$total_usuario 		= $usuarios->RecordCount();
		
		if ($total_usuario > 0){
			echo "<script> alert('usuário não cadastrado, usuário já existente com este nome!')</script>"; 		
		}else{
			try{			
				$id = $ctrl_Usuarios->Adicionar($Usuarios, $conn);				
				echo "<script> alert('usuário cadastrado com sucesso!')</script>";
				header('Location: listar_usuarios.php?novo=1');
			}catch(Exception $ex){
				echo "<script> alert('".$ex->getMessage()."'); </script>";
			}
		}
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
			<h5 class="mb-0 text-white lh-100">Agenda - Cadastro de usuários</h5>
			<small>Hoje, <?=date("F j, Y, g:i a");?></small>
		</div>
	</div>
	<div class="my-3 p-3 bg-white rounded box-shadow">
		<h6 class="border-bottom border-gray pb-2 mb-0">
			<strong><h2>Cadastrar usuario</h2></strong>
		</h6>
<div class="table-responsive">
<table width="100%" align="center" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
<form action="" method="post">
<tbody>
    <tr>
        <th>Nome:</th>
		<th><input type="text" name="nome" placeholder="Nome do usuário" title="Informe o nome para este usuário do sistema."></th>
		<th>Usuário:</th>
		<th><input type="text" name="usuario" placeholder="Usuário de acesso" title="Indorme o nome de usuário para acesso ao sistema." required></th>
		<th>Senha:</th>
		<th><input type="password" name="senha" placeholder="Senha" title="Informe a senha que o usuário irá utilizar para autenticar no sistema." required></th>
	</tr>
    <tr>
        <th valign="middle">Permissão:</th>
		<th colspan="5" valign="middle">
			<span title="Esta opção dará acessos de administrador no sistema."><input type="checkbox" value="0" name="permissao"> - Administrador </span>
			<br><span title="Esta opção dará acessos de convidado no sistema."><input type="checkbox" value="1" name="permissao"> - Convidado </span>
			<br><span title="Esta opção dará acessos de usuário comumm no sistema."><input type="checkbox" value="2" name="permissao"> - Usuário </span>
		</th>
	</tr>	
<tr>
    <th colspan="6"><input type="submit" name="salvar" value="Salvar Usuário"></th>
</tr>
</tbody>
</form>
</table>
		
	</div>
	<?	include_once "../../js/scripts_pagina.php";?> 
</body>
</html>