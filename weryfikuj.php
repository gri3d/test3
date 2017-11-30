<?php
 session_start();
 $user=$_POST['user']; // login z formularza
 $pass=$_POST['pass']; // hasło z formularza
 
 $dbhost="localhost"; $dbuser="gri3d"; $dbpassword="9E6Yja6u"; $dbname="gri3d_z7";
 $polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
 mysqli_select_db ($polaczenie, $dbname);
 

 $rezultat = mysqli_query ($polaczenie, "SELECT * FROM github WHERE user='$user'");
 
 while($rekord = mysqli_fetch_array($rezultat)){
	if(!$rekord){
		mysqli_close($link); 
			?><script>alert("Bledne haslo lub email!!!!!!")</script>;<?php
		echo 	"<script type=\"text/javascript\">
				window.setTimeout(\"window.location.replace('index.html');\",10);
				</script>";
	}else{ 
		if($rekord['haslo']==$pass && $rekord['logowanie']<3){
			$zapytanie = mysqli_query($polaczenie, "UPDATE github SET logowanie=0 WHERE user='$user");
			setcookie("signin", true);
			setcookie("user", $user);
			setcookie("imie", $rekord['imie']);
			setcookie("nazwisko", $rekord['nazwisko']);
			$_SESSION['path'] = $_SERVER['DOCUMENT_ROOT'].'/z7/users/'.$user.'/';
	 		$_SESSION['root'] = $_SESSION['path'];
			$_SESSION['user'] = $user;
			echo 	"<script type=\"text/javascript\">
					window.setTimeout(\"window.location.replace('interface.php');\",10);
					</script>";
		}else{
			$zapytanie = mysqli_query($polaczenie, "UPDATE github SET logowanie=logowanie+1 WHERE user='$user'");
			$zapytanie = mysqli_query($polaczenie, "SELECT logowanie FROM github WHERE user='$user'");
			while($rekord = mysqli_fetch_array($zapytanie)){
				if ($rekord['logowanie'] > 2){
					echo "<script>alert('Twoje konto zostalo zablokowane!!!')</script>";
				}else{
					?><script>alert("Bledne haslo lub login!!!!!!")</script>;<?php
				}
			}
			echo 	"<script type=\"text/javascript\">
					window.setTimeout(\"window.location.replace('index.html');\",10);
					</script>";
		}
	}
 }
?>