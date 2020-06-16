<?php
session_start();
include 'connect.php';

?>

<!DOCTYPE html>
<html>

<head>
    <Title>Place An Order</Title>
    <link rel="stylesheet" href="styles.css">
    <style>
         .border-class {
            width: 35%;
            font-size: 18px;
            border-bottom-style: solid;
            border-bottom-color: black;
            border-bottom-width: 3px;
        }
        .header {
            text-align: center;
        }
        .customer-page-button {
            background-color: blue;
            border: 2px solid black;
            border-radius: 0px;
            color: white;
            padding: 10px 10px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            transition-duration: 0.4s;
        }
        .customer-page-button:hover {
            background-color: darkblue;
            color: white;
        }
        .order-form {
            text-align: right;
        }
        .parcel-form {
            text-align: left;
            padding: 10px 10px 10px
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Place An Order</h1>
        <div class="go-back-button">
            <button onclick="window.location.href='<?php echo $_SESSION['returnpage']; ?>'" class="account-button">Go back</button>
        </div>
    </div>

    <div class = "parcel-form">
            <form action = "addParcel.php" method = "post">
                <label for="Length">Length</label>
                <input type="text" name="Length"><br><br>
                <label for="Width">Width</label>
                <input type="text" name="Width"><br><br>
                <label for="Height">Height</label>
                <input type="text" name="Height"><br><br>
                <label for="Weight">Weight</label>
                <input type="text" name="Weight"><br><br>
                <input name = "addParcel" type="submit" value="Add Parcel To Order">
            </form>
    </div>
    

    <div class= "Parcels">
    <?php
    $conn = OpenCon();

    echo "Your Order Number:  ".  $_SESSION['OID'] ."\n\n\n\n|";
    
    $parcels = "SELECT PID, Length, Width, Height, Weight 
                From Parcel P
                where " .$_SESSION['OID']." = P.OID";
    $result = $conn->query($parcels);
    if ($result->num_rows > 0) {
        echo 
            "<table>
            <tr>
                <th class='border-class'>PID</th>
                <th class='border-class'>Length</th>
                <th class='border-class'>Width</th>
                <th class='border-class'>Height</th>
                <th class='border-class'>Weight</th>

            </tr>";
        while ($row = $result->fetch_assoc()) {
            echo
                "<tr>
                    <td class='border-class'>" .$row["PID"]. "</td>
                    <td class='border-class'>" .$row["Length"]. "</td>
                    <td class='border-class'>" .$row["Width"]. "</td>
                    <td class='border-class'>" .$row["Height"]. "</td>
                    <td class='border-class'>" .$row["Weight"]. "</td>
                </tr>
                    ";
        }
    } else {
        echo "0 results";
    }
    Closecon($conn);
    ?>
    </div>

 <div class = "order-form">
        <form action="OrderHandler.php" method="post">
            <label for="PickupAddress">Pickup Location</label>
            <input type="text" name="PickupAddress" placeholder="">
            <label for="DropOffAddress">DropOffAddress</label>
            <input type="text" name="DropOffAddress" placeholder=""><br><br>
            <input type="submit" value="Place Order">

        </form>
    </div>
  
</body>
 

</html>