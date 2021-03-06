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

$PickupAddress = $_POST['PickupAddress'];
$DropOffAddress = $_POST['DropOffAddress'];

$cid = "SELECT CID from Accounts A where A.username = '".$_SESSION['username']."'";
$resultcid = $conn->query($cid);
$row = $resultcid->fetch_assoc();
$cid = $row['CID'];

$maxOID = $_SESSION['OID'];


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

$maxIID = 'SELECT max(IID) as id from Invoice';
$result = $conn->query($maxIID);
$row = $result->fetch_assoc();
$IID = $row['id'] + 1;


$cost = $_SESSION['COST'];
$invoice = "INSERT into Invoice(IID,Cost,CID,SSN,OID) values ($IID, $cost,$cid, 626343110,$maxOID)";
$resultInvoice = $conn->query($invoice);

if ($resultETA == TRUE &
	$resultOD == TRUE & 
	$resultOOg == TRUE &
	$resultOOn == TRUE &
	$resultOS == TRUE &
	$resultPO == TRUE &
	$resultInvoice == TRUE) {
    echo "Succesfully Placed Order";
	header("refresh:1;url='../src/customer.php'");
} else {
	echo "error";
	header("refresh:1;url='../src/PlaceOrder.php'");
}
CloseCon($conn);
?>
