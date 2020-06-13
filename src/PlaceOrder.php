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

    <form action="/.php" method="post">
        <label for="Size">Large</label>
		<input type="radio" name="Size" value="male">
		
        <label for="Medium">Medium</label>
		<input type="radio" name="Size"  value="female">
		
        <label for="Small">Small</label>
		<input type="radio" name="Size" value="other"><br><br>

		<label for="PickupAddress">Pickup Location</label>
		<input type="text" placeholder=""><br><br>
		<label for="DropOffAddres">DropOffAddress</label>
		<input type="text" placeholder=""><br><br>

        <input type="submit" value="Place Order">
    </form> 

</body>

</html>