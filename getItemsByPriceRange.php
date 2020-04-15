<?php 
include("dbConnect.php");

$price1 = $_GET['price1'];
$price2 = $_GET['price2'];

$stmt = $db->prepare("SELECT * FROM `items` WHERE `price` >= ? AND `price` <= ?");
$stmt -> bindValue(1,$price1);
$stmt -> bindValue(2,$price2);
$stmt->execute();


while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr><td style = 'border: 1px solid'>".$row['name']."</td></tr>";
}
?>
