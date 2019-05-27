<?php

$servername = "localhost";
$username = "root";
$password = "vertrigo";
$database = "teste_webmais";

$conectar = mysql_connect($servername, $username, $password);
// Check connection
if (!$conectar) {
    die("Falha: " . mysqli_connect_error());
}
mysql_select_db($database, $conectar);
//echo "Sucesso";
//mysqli_close($conectar);
?> 