<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <Title>Place An Order</Title>
    <link rel="stylesheet" href="styles.css">
    <style>
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
        .Form {
            text-align: center;
        }
        .parcel-form {
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

        <div class = "Form">
    <form action="OrderHandler.php" method="post">
           
        <div class = "parcel-form">
            <form action = "PlaceOrder.php" method = "post">
                <label for="Length">Length</label>
                <input type="text" name="Length"><br><br>
                <label for="Width">Width</label>
                <input type="text" name="Width"><br><br>
                <label for="Height">Height</label>
                <input type="text" name="Height"><br><br>
                <label for="PickupAddress">Pickup Location</label>
                <input type="text" name="PickupAddress" placeholder=""><br><br>
                <label for="DropOffAddress">DropOffAddress</label>
                <input type="text" name="DropOffAddress" placeholder=""><br><br>
                <input type="submit" value="Add Parcel To Order">
            </form>
        </div>
        
        <input type="submit" value="Place Order">
    </form>
    </div>
</body>

</html>