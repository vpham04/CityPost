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

// this is not referenced by parcel
// $placedOrder = "INSERT into PlacedOrder(OID,CID) values ($OID,$CID)";
// $resultPO = $conn->query($placedOrder); 

$orderedParcel = "INSERT into OrderedParcel(OID,CID) values ($OID,$CID)";
$resultOP = $conn->query($orderedParcel); 

header("refresh:0;url='../src/PlaceOrder.php'");

Closecon($conn);
?>
