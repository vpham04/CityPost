<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <Title>Courier Page</Title>
    <link rel="stylesheet" href="styles.css">
    <style>
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
        <form method="post">
            <label for="date">Which week:</label>
            <select name="date" id="date">
                <option value="clear">Clear</option>
                <option value="2020-05-01">2020-05-01</option>
                <option value="2020-05-08">2020-05-08</option>
                <option value="2020-05-15">2020-05-15</option>
                <option value="2020-05-22">2020-05-22</option>
                <option value="2020-05-28">2020-05-28</option>
            </select>
            <input type="submit" class="customer-option-button" value="View Weekly Schedule">
        </form>
        <!-- <button onclick="window.location.href='../src/schedule.php'" class="customer-option-button">View Schedule</button> -->
        <!-- add php -->
        <button onclick="window.location.href='../src/routes.php'" class="customer-option-button">View Routes</button>


        <!-- TODO -->
        <button onclick="window.location.href='../src/packages.php'" class="customer-option-button">View Packages</button>

        <button onclick="window.location.href='../src/countorder.php'" class="customer-option-button">Number of Orders</button>
    </div>
</body>

<?php
if (isset($_POST['date'])) {
    include 'schedule.php';
    Schedule($_POST['date']);
}
?>

</html>