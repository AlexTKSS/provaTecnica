<?php

include("action.php");

$id = $_GET['id'];
$del=("delete from tbtimefutebol where id = '$id'");
$registros = $conn->prepare($del);
$registros->execute(); 
header("location:index.php"); 
?>
