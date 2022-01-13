<?php
	session_start();
	include_once 'bdados.php';
	$id=$_SESSION['id'];

	$username 	= $_POST['username'];
	$email 		= $_POST['email'];
	$password 	= $_POST['password'];
	$permissoes = $_POST['permissoes'];
	

	$queryAtualizar = $conexao->query("UPDATE users SET username='$username', email='$email', password='$password', permissoes='$permissoes' WHERE id='$id'");

	$affected_rows =mysqli_affected_rows($conexao);

	if($affected_rows > 0){
		header("Location: ../users.php");
	}

?>