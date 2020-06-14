<?php
session_start();

include 'connect.php';
$conn = OpenCon();

$username = $_SESSION["username"];
$password = $_POST["newpassword"];

$sql = "UPDATE Accounts 
SET Password = '$password'
where Username = '$username'";

if ($conn->query($sql) == TRUE) {
    echo "Password changed";
} else {
    echo "Error: " . $sql . "<br />" . $conn->error;
}
CloseCon($conn);
