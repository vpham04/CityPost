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
        <h1>Courier</h1>
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
                <input name="package" type="submit" class="customer-option-button" value="View Packages">
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
                    <option value="2020-05-01">2020-05-01</option>
                    <option value="2020-05-08">2020-05-08</option>
                    <option value="2020-05-15">2020-05-15</option>
                    <option value="2020-05-22">2020-05-22</option>
                    <option value="2020-05-28">2020-05-28</option>
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
if (isset($_POST['package'])) {
    include 'packages.php';
    Package();
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