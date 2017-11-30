<?php 

	session_start();

	//foreach ($_POST as $nazwa => $wartosc) { 
	//	echo "nazwa zmiennej POST: ".$nazwa." , jej wartosc: ".$wartosc. "<br/>"; 
	//}
	
	$folder = $_COOKIE["user"];
	


	
	if(IsSet($_POST['plik1'])){
		$filename = $_SESSION['path'].'/'.$_POST['plik1'];
		header('Content-Type:application/force-download');
		header('Content-Disposition: attachment; filename="'.basename($filename).'";');
		header('Content-Length:'.@filesize($filename));
		@readfile($filename)or die('File not found.');    
		header('Location: interface.php');
	}

	if(IsSet($_POST['plik2'])){
		unlink($_SESSION['path'].'/'.$_POST['plik2']);
		header('Location: interface.php');
	}
	
	if(IsSet($_POST['folder1'])){
		$_SESSION['path'] = $_SESSION['path'].'/'.$_POST['folder1'];
		header('Location: interface.php');
	}
	
	if(IsSet($_POST['folder2'])){
		$path = $_SESSION['path'].'/'.$_POST['folder2'];
		rmdir("$path");
		header('Location: interface.php');
	}
	if(IsSet($_POST['path'])){
		if($_POST['path'] != $_SESSION['root']){
			$_SESSION['path'] = $_POST['path'].'/users/'.$_SESSION['user'];
		}
		header('Location: interface.php');
	}
?> 