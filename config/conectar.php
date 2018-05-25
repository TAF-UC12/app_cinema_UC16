<!--

CONEXÃO COM O BANCO DE DADOS 'PORTALNOTICIAS'

-->

<?php

$strcon = mysqli_connect("localhost", "root", "root", "cinema_v4");

if (!$strcon){
	die("Não foi possivel conectar ao servidor!");
}
mysqli_set_charset('utf8');
?>