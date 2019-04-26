<?php
//Inicia a sessão
session_start();

//Add o caminho sistema a uma váriavel de sessão; descomentar o printr para entender melhor
/*if (!isset($_SESSION["root"])) {
	$_SESSION["root"] = $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];
}*/

$_SESSION["root"]="/opt/lampp/htdocs/projetofinal/";
//print_r($_SESSION["root"] );

//Chamo o arquivo responsável por gerenciar as rotas do sistema
include $_SESSION["root"].'routes.php';
?>