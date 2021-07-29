<?php
$id = $_POST["id"];
$dbh = new PDO("mysql:host=localhost;dbname=todo-list", "root", "Tanger123");
$sql = " DELETE FROM taches WHERE idtaches = $id ";
$getFormer = $dbh->prepare($sql);
$getFormer->execute();

?>