<? 
if (empty($_GET['logado'])){
	 $_GET['logado'] = "";
}else{
	$login = $_GET['logado'];	
	session_unset();
}
?>
<!DOCTYPE html>
<html lang="pt-br" >
<head>
	<meta charset="utf8">
	<title>Agenda telefonica</title>  
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap3.css">
</head>
<body>
	<header>
		<div class="wrapper">
			<form class="form-signin" action="lib/check.php" method="post">
				<h2 class="form-signin-heading" align="center"><strong><span style="color:#06F">Agenda</span> - Login</strong></h2>
				<input type="text" class="form-control" name="login" placeholder="Insira seu login" required autofocus />
				<input type="password" class="form-control" name="senha" placeholder="Insira sua senha" required/>      
				<input type="submit" name="OK" class="btn btn-lg btn-primary btn-block" value="Entrar no sistema">
			</form>
		</div>
	</header>
</body>
</html>