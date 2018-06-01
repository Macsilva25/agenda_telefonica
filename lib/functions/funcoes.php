<? 		
function ConverteData($data){
	$ano = substr($data,0,4);
	$mes = substr($data,5,2);
	$dia = substr($data,8,2);
	
	$DataConvertida = $dia."/".$mes."/".$ano;
return $DataConvertida;
}

function DesConverteData($data){
	$ano = substr($data,0,4);
	$mes = substr($data,5,2);
	$dia = substr($data,8,2);
	
	$DataConvertida = $ano."-".$mes."-".$dia;
return $DataConvertida;
}

function ConverteTelefone($telefone){
	$mask1 = "(".substr($telefone,0,2).")";
	$mask2 = " ";
	$mask3 = substr($telefone,2,5);
	$mask4 = "";
	$mask5 = substr($telefone,7,4);
	
	$TelefoneConvertido = $mask1.$mask2.$mask3.$mask4.$mask5;
return $TelefoneConvertido;
}

?>