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

if ($conn->query($sql) == TRUE) {
    echo "New record created successfully";
} else {
    /* This line says duplicate PK inserted even on first insert
    but still inserts it while spitting out the error
    */
    echo "Error: " . $sql . "<br>" . $conn->error;
}
CloseCon($conn);
