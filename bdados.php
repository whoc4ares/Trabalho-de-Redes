<?php

	
	$conexao=mysqli_connect('localhost','root','','registration');


	mysqli_set_charset($conexao,'utf8');

	
	if ($conexao->connect_error){
		die("Falha ao efetuar a ligação: ".$conexao->connect_error);
	}


?>