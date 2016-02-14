<?php
$host = "localhost";
$db = "estoque";
$user = "root";
$pass = "";

$conn = mysql_connect($host,$user,$pass);
mysql_select_db($db,$conn);
if(!$conn){
	echo "Não foi possivel conectar no banco de dados";
}
?>