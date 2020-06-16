<?php
session_start();
include 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <Title>My Account</Title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .account-button {
            float: right;
            margin-left: 15px;
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
            padding: 10px 10px 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>My Account</h1>
        <?php
        $_SESSION['returnpage'] = '../src/customer.php';
        echo "Hi " . $_SESSION["username"] . "<br/>";
        ?>
        <!-- php for customer info -->
        <div class="account">
            <button onclick="window.location.href='../src/login.html'" class="account-button">Logout</button>
            <button onclick="window.location.href='../src/updatepassword.html'" class="account-button">Change Password</button>
            <button onclick="window.location.href='../src/login.html'" class="account-button">Delete Account</button>
        </div>
    </div>

    <div class="customer-options">
        <button onclick="window.location.href='../src/OrderHistory.php'" class="customer-option-button">Order History</button>
        <!-- add php -->
        <!--$_SESSION['orderNum']-->
        <button onclick="window.location.href='../src/createOrder.php'" class="customer-option-button">Place Order</button>
        <!-- TODO: add intermediate php file before redirecting to PlaceOrder.php -->
        <?php
        $conn = OpenCon();
        $max = 'SELECT max(OID) as id from Parcel';
        $result = $conn->query($max);
        $row = $result->fetch_assoc();
        $OID = $row['id'];
        //echo $OID;
        $_SESSION['OID'] = $OID + 1;

        //echo $_SESSION['OID'];
        
        CloseCon($conn);
        ?>
        <!-- add php -->
    </div>
</body>

</html>