<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <Title>Place An Order</Title>
	<style>
        .header {
            background-color: rgb(102, 102, 102);
            padding: 40px 40px 40px 40px;
            margin: 0px;
        }

        body {
            background-color: #8cd38c;
            margin: 0px;
            padding: 0px;
        }

        .customer-page-button {
            float: left;
        }

        .customer-option-button {
            background-color: blue;
            border: 2px solid black;
            border-radius: 4px;
            color: white;
            padding: 15px 32px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            transition-duration: 0.4s;
        }

        .customer-option-button:hover {
            background-color: darkblue;
            color: white;
        }

        .customer-options {
            text-align: center;
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

        <div class="customer-page-button"> 
            <button onclick="window.location.href='/src/customer.php'" class="customer-page-button">Cancel Order</button>
        </div>
        <input type="submit" value="Place Order">
	</form> 
</body>

</html>