<?php
session_start();

include 'connect.php';
$conn = OpenCon();

$username = $_POST['username'];
$password = $_POST['password'];
$printname;

$sql = "SELECT Username, Password, LvlAccess FROM Accounts
WHERE Username = '$username' AND Password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION["username"] = $username;
    $lvl  = $result->fetch_assoc();
    if ($lvl["LvlAccess"] == 1) {
        header("Location: ../src/customer.php");
        exit;
    } else if ($lvl["LvlAccess"] == 2) {
        header("Location: ../src/courier.php");
        exit;
    } else {
        header("Location: ../src/manager.php");
        exit;
    }
} else {
    echo "Account not found";
}
CloseCon($conn);
