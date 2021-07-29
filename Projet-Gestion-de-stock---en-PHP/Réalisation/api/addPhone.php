<?php

$dbh = new PDO("mysql:host=localhost;dbname=Phone","root","Tanger123");
$sql = "INSERT INTO Phones(Name,Price,Model,State) VALUE (:Name,:Price,:Model,:State)";

$addPhoneQuery = $dbh ->prepare($sql);

$addPhoneQuery -> bindParam(":Name",$_POST["Name"],PDO::PARAM_STR);
$addPhoneQuery -> bindParam(":Price",$_POST["Price"],PDO::PARAM_STR);
$addPhoneQuery -> bindParam(":Model",$_POST["Model"],PDO::PARAM_STR);
$addPhoneQuery -> bindParam(":State",$_POST["State"],PDO::PARAM_STR);

$addPhoneQuery -> execute();

?>