<?php

include("action.php");

$id = $_GET['id'];
$sql = ("INSERT INTO tbtimefutebol (time) VALUES (nometime)");
$registros = $conn->prepare($sql);
$registros->execute(); 
header("location:index.php"); 
?>
