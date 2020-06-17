<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <Title>Courier Page</Title>
    <link rel="stylesheet" href="styles.css">
    <style>

    </style>
</head>

<body>
    <div class="header">
        <h1>Courier Page</h1>
        <?php
        $_SESSION['returnpage'] = '../src/courier.php';
        echo "Hello " . $_SESSION["username"] . "<br/>";
        ?>
        <!-- php for customer info -->
        <div class="account">
            <button onclick="window.location.href='../src/login.html'" class="account-button">Logout</button>
            <button onclick="window.location.href='../src/updatepassword.php'" class="account-button">Change Password</button>
        </div>
    </div>

    <div class="customer-options">
        <div class="button-container">
            <!-- <button onclick="window.location.href='../src/schedule.php'" class="customer-option-button">View Schedule</button> -->
            <!-- add php -->
            <form method="post">
                <input name="route" type="submit" class="customer-option-button" value="View Routes">
            </form>
            <!-- <button onclick="window.location.href='../src/routes.php'" class="customer-option-button">View Routes</button> -->
            <!-- TODO -->
            <form method="post">
                <input name="orders" type="submit" class="customer-option-button" value="View Orders">
            </form>
            <!-- <button onclick="window.location.href='../src/packages.php'" class="customer-option-button">View Packages</button> -->

            <form method="post">
                <input name="numorder" type="submit" class="customer-option-button" value="Numbers of Orders">
            </form>
            <br />
            <br />
            <form method="post">
                <label for="date">Which week:</label>
                <select name="date" id="date">
                    <!-- <option value="clear">Clear</option> -->
                    <?php
                    include 'connect.php';
                    $conn = OpenCon();
                    $sql = "SELECT Date from Schedule";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['Date'] . "'>" . $row['Date'] . "</option>";
                        }
                    }
                    CloseCon($conn);
                    ?>
                </select>
                <input type="submit" class="customer-option-button" value="View Weekly Schedule">
            </form>
        </div>
    </div>
</body>

<?php
if (isset($_POST['route'])) {
    include 'routes.php';
    Route();
}
if (isset($_POST['orders'])) {
    include 'courierOrders.php';
    Orders();
}
if (isset($_POST['numorder'])) {
    include 'countorder.php';
    numOrder();
}
if (isset($_POST['date'])) {
    include 'schedule.php';
    Schedule();
}
?>

</html>