<?php
session_start();
include 'connect.php';

?>

<!DOCTYPE html>
<html>

<head>
    <Title>Routes</Title>
    <link rel="stylesheet" href="styles.css">
    <style>
     h1 {
		 text-align: center;
	 }
    </style>
</head>

<body>
    <div class="header">
        <h1>Route Added</h1>
        <?php 
        $conn = OpenCon();

		$max = "SELECT MAX(RID) as id FROM AssignedRoute";
		$resultmax = $conn->query($max);
		$row = $resultmax->fetch_assoc();
		$RID = $row['id'] + 1;
		//echo $RID . "\n";
		$Distance = $_POST['Distance'];
        $SSN = $_POST['SSN'];
		// echo $RID;
        
        $sql = 'INSERT into AssignedRoute(RID,Distance,SSN)
        VALUES ('.$RID.', '.$Distance.','.$SSN.')';
        $result = $conn->query($sql);
	 
		
		$ManagerSSN = "SELECT SSN from Accounts A where A.username = '".$_SESSION['username']."'";
        $resultSSN = $conn->query($ManagerSSN);
        $row = $resultSSN->fetch_assoc();
		$ManagerSSN = $row['SSN'];
		// echo $ManagerSSN;
		// echo $RID . "\n";
		$sql = 'INSERT into SetsRoute(SSN,RID)
        VALUES ('.$ManagerSSN.','.$RID.')';
		$result = $conn->query($sql);
		
        closeCon($conn);
        header("refresh:1;url='../src/setRoute.php'");
        exit;
        ?>
        <!-- php for customer info -->

    </div>

</body>

</html>