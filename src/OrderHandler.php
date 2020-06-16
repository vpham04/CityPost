<?php
session_start();
include 'connect.php';
$conn = OpenCon();

// radiobuttons?/
if (isset($_POST['Size'])) {
	$selected_radio = $_POST['Size'];
} else {
	$selected_radio = "No Button Selected";
}

$selected_radio = $_POST['Size'];
$PickupAddress = $_POST['PickupAddress'];
$DropOffAddress = $_POST['DropOffAddress'];

$cid = "SELECT CID from Accounts A where A.username = '".$_SESSION['username']."'";
$resultcid = $conn->query($cid);
$row = $resultcid->fetch_assoc();
$cid = $row['CID'];

$maxOID = "SELECT MAX(OID) as id FROM OrderedParcel";

$resultOID = $conn->query($maxOID);
$row = $resultOID->fetch_assoc();
$maxOID = $row['id'] + 1;


// In createOrder this is inserted
// $orderedParcel = "INSERT into OrderedParcel(CID, OID) values ($cid,$maxOID)";
// $resultOP = $conn->query($orderedParcel);

$placedOrder = "INSERT into PlacedOrder(OID,CID) values ($maxOID,$cid)";
$resultPO = $conn->query($placedOrder); 

$orderStatus = "INSERT into OrderStatus(OID, Status) values ($maxOID, 'Processing')";
$resultOS = $conn->query($orderStatus);

$orderDest = "INSERT into OrderDest(OID, ShippingAddress) values ($maxOID, '$PickupAddress')";
$resultOD = $conn->query($orderDest);

$orderOrig = "INSERT into OrderOrig(OID, ReturnAddress) values ($maxOID, '$DropOffAddress')";
$resultOOg = $conn->query($orderOrig);

$today = date("Y-m-d");
$orderedOn = "INSERT into OrderedOn(OID, Date) values ($maxOID,'$today')";
$resultOOn = $conn->query($orderedOn);

$weekfromToday = date("Y-m-d", strtotime($today. ' + 7 days'));
$orderETA = "INSERT into OrderETA(OID, Date) values ($maxOID,'$weekfromToday')";
$resultETA = $conn->query($orderETA);

if ($resultETA == TRUE &
	$resultOD == TRUE & 
	$resultOOg == TRUE &
	$resultOOn == TRUE &
	$resultOP == TRUE &
	$resultOS == TRUE &
	$resultPO == TRUE) {
    echo "Succesfully Placed Order";
    header("refresh:1;url=" . $_SESSION['returnpage']);
} else {
	echo "error";
	header("refeesh:1;url=" . $_SESSION['returnpage']);
}
CloseCon($conn);
?>
