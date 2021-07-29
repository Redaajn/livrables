  <?php
$id = $_POST["id"];
$dbh = new PDO("mysql:host=localhost;dbname=phone", "root", "Tanger123");
$sql = " DELETE FROM phones WHERE id = $id ";
$getPhone = $dbh->prepare($sql);
$getPhone->execute();

?>