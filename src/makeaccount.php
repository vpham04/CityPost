<?php
include 'connect.php';
$conn = OpenCon();

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$phonenumber = $_POST['phonenumber'];

$conn->begin_transaction();

$sql = "INSERT INTO Accounts(Username, Password, LvlAccess, CID, SSN)
VALUES ('$username', '$password', 1, NULL, NULL)";
$result = $conn->query($sql);

$max = "SELECT MAX(CID) as cid FROM Customer";
$resultmax = $conn->query($max);
$row = $resultmax->fetch_assoc();
$cid = $row['cid'] + 1;
echo $cid;

$sql1 = "INSERT INTO Customer(CID, Name, PhoneNumber)
VALUES ($cid, '$name', $phonenumber)";
$result1 = $conn->query($sql1);

if ($result == true & $result1 == true) {
    echo "New account created successfully";
    $conn->commit();
} else if ($result == false & $result1 == false) {
    echo "Failed making an account";
    $conn->rollback();
} else if ($result1 == false) {
    echo "CID already exist";
    $conn->rollback();
} else {
    echo "Please choose another username";
    $conn->rollback();
}
CloseCon($conn);
