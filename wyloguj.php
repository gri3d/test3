<?php
session_start();
session_destroy();
$_COOKIE["signin"] = false;
header('Location: index.html');
?>