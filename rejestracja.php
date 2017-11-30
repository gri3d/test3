<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>
<BODY>
<?php
 $user=$_POST['user']; 
 $pass=$_POST['pass']; 
 $imie=$_POST['imie'];
 $nazwisko=$_POST['nazwisko'];
 
	$dbhost="localhost"; $dbuser="gri3d"; $dbpassword="9E6Yja6u"; $dbname="gri3d_z7";
    $polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
    mysqli_select_db ($polaczenie, $dbname);
 
	$rezultat = mysqli_query ($polaczenie, "SELECT * FROM github WHERE user='$user'");
	
	
	
	if(mysqli_num_rows($rezultat)==0){
		$dodaj = mysqli_query ($polaczenie, "INSERT INTO github SET ID='', user='$user', haslo='$pass', imie='$imie', nazwisko='$nazwisko' ");
		$nazwa = obrazki;
		mkdir ("./users/$user", 0777);
		?><script>alert("Zostales zarejestrowny!!!")</script>;<?php
		echo 	"<script type=\"text/javascript\">
				window.setTimeout(\"window.location.replace('index.html');\",200);
				</script>";
	}else{
		?><script>alert("Juz istnieje taki uzytkownik")</script>;<?php
		echo 	"<script type=\"text/javascript\">
				window.setTimeout(\"window.location.replace('rejestracja.html');\",200);
				</script>";
	}
?>
</BODY>
</HTML>