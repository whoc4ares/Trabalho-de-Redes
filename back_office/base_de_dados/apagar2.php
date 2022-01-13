<?php

	include_once 'bdados.php';

	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
	$queryApagar = $conexao->query("DELETE FROM dados WHERE id='$id'");

	if(mysqli_affected_rows($conexao) > 0 )
{
	header("Location:../contas.php");
  

}
  ?>
