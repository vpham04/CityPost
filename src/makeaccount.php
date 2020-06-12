<?php
include 'connect.php';
$conn = OpenCon();

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$phonenumber = $_POST['phonenumber'];


$sql = "INSERT INTO Accounts(Username, Password, LvlAccess, CID, SSN)
VALUES ('$username', '$password', 1, NULL, NULL)";
$result = $conn->query($sql);

if ($result == TRUE) {
    echo "New account created successfully";
} else {
    echo "Please choose another password";
}
CloseCon($conn);
