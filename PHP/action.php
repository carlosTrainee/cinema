<?php
require_once 'conexao.php';

if (!empty($_POST['action']) && $_POST['action'] == 'cadCliente') {
	$resultado = cadastrarCliente($_POST);

	if ($resultado) {
		echo "<h1>Compra Realizada com sucesso</h1>";
		//header('location: sucesso.php');
		die;
	} else {
		echo "<h1>Ocorreram erros durante sua compra</h1>";
		die;		
	}
} 