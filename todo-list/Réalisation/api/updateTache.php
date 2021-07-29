<?php
$id = $_POST["sid"];
$dbh = new PDO("mysql:host=localhost;dbname=todo-list","root","Tanger123");
$sql = "UPDATE taches SET done = :done WHERE idtaches = $id";
$addtaskQuery = $dbh->prepare($sql);
$addtaskQuery->bindParam(":done",$_POST["done"],PDO::PARAM_STR);

$addtaskQuery->execute();
?>