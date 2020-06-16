<?php
session_start();
include 'connect.php';
$conn = Opencon();

$OID = $_SESSION['OID'];

$CID = "SELECT CID from Accounts A where A.username = '".$_SESSION['username']."'";
$resultCID = $conn->query($CID);
$row = $resultCID->fetch_assoc();
$CID = $row['CID'];
// debugs

// $placedOrder = "INSERT into PlacedOrder(OID,CID) values ($OID,$CID)";
// $resultPO = $conn->query($placedOrder); 

echo "Successfully created order";
header("refresh:2;url='../src/PlaceOrder.php'");

Closecon($conn);
?>
