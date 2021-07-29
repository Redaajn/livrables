<?php
$dbh = new PDO("mysql:host=localhost;dbname=todo-list","root","Tanger123");
$sql = "INSERT INTO taches(tachename) VALUE (:tachename)";
$addTaskQuery = $dbh ->prepare($sql);
$addTaskQuery -> bindParam(":tachename",$_POST["tachename"],PDO::PARAM_STR);
$addTaskQuery -> execute();
?>