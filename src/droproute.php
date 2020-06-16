<?php
session_start();

include 'connect.php';
$conn = OpenCon();

$rid = $_POST['route'];

$sql = "DELETE FROM AssignedRoute WHERE RID = $rid";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Route deleted successfully";
    header("refresh:3;url=../src/droproute.php");
} else {
    echo "Error deleting route: " . $conn->error;
}
CloseCon($conn);
