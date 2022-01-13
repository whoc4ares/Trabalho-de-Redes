<?php

	//Cria a ligação mysqli_connect('localização da BD','utilizador de acesso', 'password', 'base de dados')
	$conexao=mysqli_connect('localhost','root','','registration');

	//ajusta o charset de comunicação entre a aplicação e a base de dados
	mysqli_set_charset($conexao,'utf8');

	//verifica a ligação
	if ($conexao->connect_error){
		die("Falha ao efetuar a ligação: ".$conexao->connect_error);
	}

?>
