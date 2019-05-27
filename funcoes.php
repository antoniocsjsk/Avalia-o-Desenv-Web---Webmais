<?php
//Função para utilizar uma query
function fbd($query,$fun='',$local='local:N/F',$cri='1'){
	global $endereco_bd,$usuario_bd,$senha_bd,$banco_bd; 
	
	$conexao = mysql_connect($endereco_bd,$usuario_bd,$senha_bd);
	$sql = $query;
	$res2 = mysql_db_query("$banco_bd","$sql",$conexao);
	
	if($res2){
		if($fun == "num"){
			$retorna = mysql_num_rows($res2);
		}
		if($fun == "fetch"){
			$retorna = mysql_fetch_array($res2);
		}
		if($fun == "row"){
			$retorna = mysql_fetch_row($res2);
		}
		if($fun == ""){
			$retorna = $res2;
		}
	}
	if($cri==2){
		return $retorna;
	}
	if($cri==1){
		if($res2){
			return $retorna;
		}else{
			$erroclasse = 	"<br /><font face='arial' size='2' color='#FF0000'>".
						  	"Erro na rotina MySql ==> <B>".mysql_error()."</b><br>Erro N&uacute;mero".
							"<b>".mysql_errno()."</b><br />Local erro: <b>Rotina: $local</b></font><br />";
			echo $erroclasse;
		}
	}
}

?>