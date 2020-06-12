<?php
include 'connect.php';
$conn = OpenCon();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT Username, Password FROM Accounts
WHERE Username = '$username' AND Password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Logged in";
} else {
    /* This line says duplicate PK inserted even on first insert
    but still inserts it while spitting out the error
    */
    echo "Error: " . $sql . "<br>" . $conn->error;
}
CloseCon($conn);
