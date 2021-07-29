<?php

$dbh = new PDO("mysql:host=localhost;dbname=phone","root","Tanger123");

$sql = "SELECT * FROM phones";
$getPhoneQuery = $dbh -> query($sql);
$getPhone = $getPhoneQuery -> fetchAll(PDO::FETCH_ASSOC);

print_r(json_encode($getPhone));

?>
