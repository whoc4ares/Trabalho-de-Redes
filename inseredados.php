<?php
 session_start();

 $username=$_SESSION['username'];
 $conexao=mysqli_connect("localhost","root","","registration");
 $sql= "SELECT username,email,id FROM users WHERE username='$username'";
 $result = mysqli_query($conexao, $sql);
 while($row = mysqli_fetch_array($result)){

	$username=$row['username'];
	$email=$row['email'];
	$id=$row['id'];
	$tipo=$_POST['tipo'];
	$raca=$_POST['raca'];
	$genero=$_POST['genero'];
	$descricao=$_POST['descricao'];


	$sql= "INSERT INTO dados (users_id,name,tipo,raca,genero,city,email) VALUES ('$id','$username','$tipo','$raca','$genero','$descricao','$email')";

	if ($conexao->query($sql)==TRUE){
		echo "Utilizador incluído com sucesso <br>";
		header("Location:contact.php");
	}
	else {
		echo "Erro: ".$sql."<br>".$conexao->error;
	}
		 
 }



	$conexao->close();
?>
