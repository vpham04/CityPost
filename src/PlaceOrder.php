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
        <label for="Large">Large</label>
        <input type="radio" name="Size" value="Large">

        <label for="Medium">Medium</label>
        <input type="radio" name="Size" value="Medium">

        <label for="Small">Small</label>
        <input type="radio" name="Size" value="Small"><br><br>

        <label for="PickupAddress">Pickup Location</label>
        <input type="text" name="PickupAddress" placeholder=""><br><br>
        <label for="DropOffAddress">DropOffAddress</label>
        <input type="text" name="DropOffAddress" placeholder=""><br><br>

        <input type="submit" value="Place Order">
    </form>
    </div>
</body>

</html>