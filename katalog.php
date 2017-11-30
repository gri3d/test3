<?php
	session_start();
	$katalog = $_POST['katalog'];
	$path = $_SESSION['path'];
	mkdir ("$path/$katalog");
	header('Location: interface.php');
?>