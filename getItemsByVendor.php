<?php 
header("Content-Type: text/xml");
header("Cache-Control: no-cahe, must-revalidate");

include("dbConnect.php");

$name = $_GET['name'];

$stmt = $db->prepare("SELECT `name` FROM `items` WHERE `FID_Vendors` = (SELECT `ID_Vendors` FROM `vendors` WHERE `name` = ?)");
$stmt ->bindValue(1,$name);
$stmt->execute();

echo "<?xml version='1.0' encoding='utf-8'?>";
echo "<items>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print "<item><name>".$row['name']."</name></item>";
}
echo "</items>"
?>