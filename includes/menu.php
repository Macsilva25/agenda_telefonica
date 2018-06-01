<? 
if (empty($_GET['s'])){
	 $_GET['s'] = "";
}else{
	$sair = $_GET['s'];	
	$_SESSION['Login'] = null;
	header('Location: ../../index.php?logado=n');
}
?>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
	<a class="navbar-brand mr-auto mr-lg-0" href="#"> Agenda </a>       
	<button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
	<span class="mr-auto" style="font-size:14px;"></span><span class="navbar-toggler-icon"></span></button>
	<div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="../Inicio/inicio.php"><strong>Inicio</strong> <span class="sr-only">(current)</span></a>
			</li>
			<?	
				$modulos 			= $ctrl_Modulos->Listar($Modulos, $conn);
				$total_modulos 		= $modulos->RecordCount(); 		

				for ($i =0; $i < $total_modulos; $i++){
				$id_modulo 			= $modulos->fields[0];		
				$descricao_modulo	= $modulos->fields[1];		
			?>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle active" href="" id="dropdown0<?=$i;?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong><?=$descricao_modulo;?></strong></a>
				<div class="dropdown-menu" aria-labelledby="dropdown01">
					<? 
						$funcionalidade 			= $ctrl_Funcionalidades->Listar($Funcionalidades, $id_modulo, $conn);
						$total_funcionalidades 		= $funcionalidade->RecordCount(); 		

						for ($x =0; $x < $total_funcionalidades; $x++){
						$descricao_funcionalidade		= $funcionalidade->fields[0];		
						$url					 		= $funcionalidade->fields[1];		
					?>
					<a class="dropdown-item" href="<?="../../".$url;?>"><strong><?=$descricao_funcionalidade;?></strong></a>
					<? 	
						$funcionalidade->MoveNext();
					}
					?>
				</div>
			</li>
			<? 	
				$modulos->MoveNext();
			} 
			?> 
			<li class="nav-item">
				<a class="nav-link active" href="<?=$_SERVER['PHP_SELF'];?>?s=s"><strong>Sair</strong></a>
			</li>      
		</ul>
	</div>
</nav>