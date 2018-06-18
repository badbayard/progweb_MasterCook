<?php 
	$connexion = mysqli_connect('localhost','root','','bd_projet');
	if(mysqli_connect_errno())
	{
		printf("echec de la connexion : \%s ",mysqli_connect_error());
	}
?>