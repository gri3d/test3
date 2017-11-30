<?php
session_start();
$max_rozmiar = 1024*1024;
$folder = $_COOKIE["user"];
if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
    if ($_FILES['plik']['size'] > $max_rozmiar) {
    } else {
        move_uploaded_file($_FILES['plik']['tmp_name'],
                $_SESSION['path'].'/'.$_FILES['plik']['name']);
    }
	
} else {
   echo 'B³¹d przy przesy³aniu danych!';
}
	echo 	"<script type=\"text/javascript\">
			window.setTimeout(\"window.location.replace('interface.php');\",10);
			</script>";
?>