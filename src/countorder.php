<?php
function numOrder()
{

    include_once 'connect.php';
    $conn = OpenCon();

    $sql = "SELECT COUNT(Distinct OID) as NUM
    FROM IntransitParcel ip, Parcel p
    WHERE ip.VID = p.VID AND ip.SSN IN 
    (SELECT SSN 
    FROM Accounts
    WHERE Username = '" . $_SESSION["username"] . "')";
    $result = $conn->query($sql) or die($conn->error);
    $row = $result->fetch_assoc();
    $NUM = $row['NUM'];

    if ($result->num_rows > 0) {
        echo "<h1 class='title'>Orders to fulfill: " . $NUM . "</h1>";
    } else {
        echo "No orders to fulfill";
    }
    CloseCon($conn);
}
