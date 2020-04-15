<?php 
include("dbConnect.php");

$name = $_GET['name'];

$stmt = $db->prepare("SELECT `name` FROM `items` WHERE `FID_Category` = (SELECT `ID_Category` FROM `category` WHERE `name` = ?)");
$stmt -> bindValue(1,$name);
$stmt->execute();

$result = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    array_push ($result, $row['name']);
}
echo json_encode($result);
?>