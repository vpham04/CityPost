<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <Title>Place An Order</Title>
   
</head>

<body>
    <div class="header">
        <h1>Place An Order</h1>
        <?php
        echo "Username: " . $_SESSION["username"] . "<br/>";
        ?>
        <!-- php for customer info -->
        <div class="logout">
            <button onclick="window.location.href='/src/login.html'" class="logout-button">Logout</button>
        </div>
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
	

</body>

</html>