<?php
session_start();

include 'connect.php';
$conn = OpenCon();

$username = $_POST['username'];
$password = $_POST['password'];
$printname;

$sql = "SELECT Username, Password FROM Accounts
WHERE Username = '$username' AND Password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION["username"] = $username;
    // $_SESSION["password"] = $password;
    header("Location: ../src/customer.php");
    exit;
} else {
    echo "Account not found";
}
CloseCon($conn);
