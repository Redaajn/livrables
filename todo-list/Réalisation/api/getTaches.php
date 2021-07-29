<?php
$dbh = new PDO("mysql:host=localhost;dbname=todo-list","root","Tanger123");
$sql = " SELECT * FROM taches ";
$TaskQuery = $dbh->query($sql);
$getTask = $TaskQuery->fetchAll(PDO::FETCH_ASSOC);
print_r(json_encode($getTask));
?>