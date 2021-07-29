<?php
$id = $_POST["id"];
$dbh = new PDO("mysql:host=localhost;dbname=phone","root","Tanger123");
$sql = "UPDATE Phones SET Name = :Name,Price= :Price,Model = :Model,State = :State WHERE id = $id";
$editPhoneQuery = $dbh->prepare($sql);
$editPhoneQuery->bindParam(":Name",$_POST["Name"],PDO::PARAM_STR);
$editPhoneQuery->bindParam(":Price",$_POST["Price"],PDO::PARAM_STR);
$editPhoneQuery->bindParam(":Model",$_POST["Model"],PDO::PARAM_STR);
$editPhoneQuery->bindParam(":State",$_POST["State"],PDO::PARAM_STR);


$editPhoneQuery->execute();
?>