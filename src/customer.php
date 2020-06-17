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
            <button onclick="window.location.href='../src/updatepassword.php'" class="account-button">Change Password</button>
        </div>
    </div>

    <div class="customer-options">
        <div class="button-container">
            <form method="post">
                <input name="history" type="submit" class="customer-option-button" value="Order History">
            </form>
            <!-- <button onclick="window.location.href='../src/OrderHistory.php'" class="customer-option-button">Order History</button> -->
            <!-- add php -->
            <!--$_SESSION['orderNum']-->
            <!-- <form method="post">
            <input name="create" type="submit" class="customer-option-button" value="Place Order">
        </form> -->
            <button onclick="window.location.href='../src/createOrder.php'" class="customer-option-button">Place Order</button>
        </div>
        <!-- TODO: add intermediate php file before redirecting to PlaceOrder.php -->
        <?php
        $conn = OpenCon();
        $max = 'SELECT max(OID) as id from Parcel';
        $result = $conn->query($max);
        $row = $result->fetch_assoc();
        $OID = $row['id'];
        //echo $OID;
        $_SESSION['OID'] = $OID + 1;
        $_SESSION['COST'] = 0;
        //echo $_SESSION['OID'];

        CloseCon($conn);
        ?>
        <!-- add php -->
    </div>
</body>

</html>

<?php
if (isset($_POST['history'])) {
    include 'OrderHistory.php';
    History();
}
// if (isset($_POST['create'])) {
//     include 'createOrder.php';
//     Create();
// }
?>