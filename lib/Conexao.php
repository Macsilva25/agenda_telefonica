<?
//variáveis de conexão ao banco de dados mysql
	$databaseType	=	"mysql";
	$databaseName	=	"xpto";
	$host		    =	"localhost";
	$user			=	"root";
	$pass			=	"";
	$adodbPath	    = 	$_SERVER['DOCUMENT_ROOT']."/agenda_telefonica/lib/adodb";

	//importando recursos
	require_once($adodbPath."/adodb.inc.php");
	
	//conexão ao banco
	global $conn;
	$conn = NewADOConnection("$databaseType");
	$conn->Connect($host,$user,$pass,$databaseName);

//variáveis de conexão ao banco de dados sql server
/*
	$databaseType	=	"mssql";
	$databaseName	=	"xpto";
	$host		    =	"localhost";
	$user			=	"sa";
	$pass			=	"sysadmin";
	$adodbPath	    = 	$_SERVER['DOCUMENT_ROOT']."/olds/xpto/agenda/lib/adodb";

	//importando recursos
	require_once($adodbPath."/adodb.inc.php");
	
	//conexão ao banco
	global $connSql;
	$connSql = NewADOConnection("$databaseType");
	$connSql->Connect($host,$user,$pass,$databaseName);
*/	
	
?>