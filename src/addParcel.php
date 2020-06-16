<?php
session_start();
include 'connect.php';

?>

<!DOCTYPE html>
<html>

<head>
    <Title>Parcels</Title>
    <link rel="stylesheet" href="styles.css">
    <style>
     h1 {
		 text-align: center;
	 }
    </style>
</head>

<body>
    <div class="header">
        <h1>Parcel Added</h1>
        <?php 
        $conn = OpenCon();

		$max = "SELECT MAX(PID) as id FROM Parcel";
		$resultmax = $conn->query($max);
		$row = $resultmax->fetch_assoc();
		$PID = $row['id'] + 1;
		echo $PID;
		
	 	$length = $_POST['Length'];
        $width = $_POST['Width'];
		$height = $_POST['Height'];
        $weight = $_POST['Weight'];
        $oid = $_SESSION['OID'];
		
        $sql = 'INSERT into Parcel(PID, Length, Width, Height, Weight, OID, VID)
        VALUES ($PID, '.$length.', '.$width.', '.$height.', '.$weight.' ,'.$oid.', NULL)';
        $result = $conn->query($sql);
         
        $conn ->query($sql);

        closeCon($conn);
        header("refresh:1;url='../src/PlaceOrder.php'");
        exit;
        ?>
        <!-- php for customer info -->

    </div>

</body>

</html>