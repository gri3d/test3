<?php
	session_start();
	if($_COOKIE["signin"] != true){
	header('Location: index.html');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Serwis internetowy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
        <div class="container col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4">
            <br />
            <div class="panel panel-default">
                <div class="panel-heading">
					<h1>Twoje pliki ( <?php echo $_COOKIE["imie"] ?> ):</h1>
                </div>
				<div class="panel-body">
					<form action="pobierz.php" method="POST">
					<?php
						$folder = $_SESSION['path'];
						foreach(scandir($folder) as $file)
						if(is_dir($folder.'/'.$file) && $file != '.' && $file != '..'){
							echo "<row><button type='submit' name='folder1' class='btn btn-info' style='width: 79%' value=".$file.">".$file."</button>
							<button type='submit' name='folder2' class='btn btn-danger' style='width: 20%' value=".$file.">Usun</button></row>";
						}elseif($file != '.' && $file != '..'){
							echo "<row><button type='submit' name='plik1' class='btn btn-default' style='width: 79%' value=".$file.">".$file."</button>
							<button type='submit' name='plik2' class='btn btn-danger' style='width: 20%' value=".$file.">Usun</button></row>";
						}else{
							$tmp = realpath(dirname($file));
							echo "<row><button type='submit' name='path' class='btn btn-primary' style='width: 100%' value=".$tmp.">".$file."</button></row>";
						}
					?>
					</form>
				</div>
                <div class="panel-body">
					<form action="odbierz.php" method="POST" ENCTYPE="multipart/form-data">
						<input type="file" style='width: 100%' name="plik"/><br/>
						<input type="submit" style='width: 100%' class="btn btn-default" value="Wyslij plik"/> 
					</form>
				</div>
				<div class="panel-body">
					<form action="katalog.php" method="POST">
						<input type="text" class="form-control" name="katalog" style="width: 100%"  />
						<input type="submit" value="Stworz katalog" class="btn btn-default" style="width: 100%" />
					</form>
				</div>
				<div class="panel-heading">
					<h1><input type="button" value="Wyloguj" class="btn btn-default" style="width: 100%" onClick="location.href='wyloguj.php';" /></h1>
                </div>
            </div>
        </div>

</body>
</html>
