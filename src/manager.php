<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manager Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        td {
            padding-top: 10px;
            border-bottom-style: solid;
            border-bottom-color: black;
            border-bottom-width: 2px;
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
        <h1>Manager Control Panel</h1>
        <?php
        $_SESSION['returnpage'] = '../src/manager.php';
        echo "Welcome Manager " . $_SESSION["username"] . "<br/>";
        ?>
        <div class="account">
            <button onclick="window.location.href='../src/login.html'" class="account-button">Logout</button>
            <button onclick="window.location.href='../src/updatepassword.html'" class="account-button">Change Password</button>
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
        <button onclick="window.location.href='../src/employee.php'" class="customer-option-button">View Employees</button>
        <button onclick="window.location.href='../src/routes.php'" class="customer-option-button">Set Route</button>
        <button onclick="window.location.href='../src/deleteroute.php'" class="customer-option-button">Delete Route</button>
        <!-- TODO: -->
        <button onclick="window.location.href='../src/invoice.php'" class="customer-option-button">See spenders</button>
        <form action="../src/employeecontact.php" method="post">
            <label for="date">Which contact:</label>
            <input type="radio" id="phone" name="contact" value="Email">
            <label for="male">Email</label>
            <input type="radio" id="email" name="contact" value="PhoneNumber">
            <label for="female">PhoneNumber</label><br>
            <input type="submit" class="customer-option-button" value="Get employee contact info">
        </form>
    </div>
</body>

<?php
if (isset($_POST['date'])) {
    include 'schedule.php';
    Schedule($_POST['date']);
}
?>

</html>
