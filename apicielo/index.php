<?php
session_start();
include_once("conexao.php");
include_once("funcoes.php");
include_once("cabecalho.php");
	if(isset($_GET['page']) && !empty($_GET['page'])){
		$_POST['page'] = $_GET['page'];
	}
	if(empty($_POST['page'])){
		include_once("view.php");
	}
	else{
		include_once($_POST['page'].".php");  //DevSkim: ignore DS181731 
	}
include_once("rodape.php");

?>
		

