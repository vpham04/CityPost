<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <Title>Place An Order</Title>
    <link rel="stylesheet" href="styles.css">
    <style>
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
    </style>
</head>

<body>
    <div class="header">
        <h1>Place An Order</h1>
        <?php
        echo "Username: " . $_SESSION["username"] . "<br/>";
        ?>
        <!- -->
    </div>

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
    <button onclick="window.location.href='../src/customer.php'" class="customer-page-button">Cancel Order</button>
</body>

</html>