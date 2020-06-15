<?php
session_start();

include 'connect.php';
$conn = OpenCon();

$ssn = $_POST['employee'];

$sql = "DELETE FROM Employee WHERE SSN = $ssn";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("refresh:5;url=../src/fireEmployee.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
CloseCon($conn);
