<?php
session_start();
$_SESSION['routeset'] = false;
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
            <button onclick="window.location.href='../src/updatepassword.php'" class="account-button">Change Password</button>
        </div>
    </div>

    <div class="customer-options">
        <div class="button-container">
            <form method="post">
                <input name="employee" type="submit" class="customer-option-button" value="View Employees">
            </form>
            <form method="post">
                <input name="setroute" type="submit" class="customer-option-button" value="Set Route">
            </form>
            <form method="post">
                <input name="route" type="submit" class="customer-option-button" value="Delete Route">
            </form>
            <form method="post">
                <input name="profit" type="submit" class="customer-option-button" value="See spender">
            </form>
        </div>
        <br />
        <div class="button-container">
            <form method="post">
                <label for="date">Which week:</label>
                <select name="date" id="date">
                    <!-- <option value="clear">Clear</option> -->
                    <?php
                    include_once 'connect.php';
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
            <form method="post">
                <input name="employeeAll" type="submit" class="customer-option-button" value="Employee scheduled for all weeks">
            </form>
        </div>
        <br />
        <form method="post">
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
if (isset($_POST['employee'])) {
    $_SESSION['routeset'] = false;
    include 'employee.php';
    Employee();
}
if (isset($_POST['date'])) {
    $_SESSION['routeset'] = false;
    include 'schedule.php';
    Schedule();
}
if (isset($_POST['contact'])) {
    $_SESSION['routeset'] = false;
    include 'employeecontact.php';
    empContact();
}
if (isset($_POST['route'])) {
    $_SESSION['routeset'] = false;
    include 'deleteroute.php';
    deleteRoute();
}
if (isset($_POST['profit'])) {
    $_SESSION['routeset'] = false;
    include 'invoice.php';
    Invoice();
}
if (isset($_POST['employeeAll'])) {
    $_SESSION['routeset'] = false;
    include 'schedule.php';
    ScheduleAll();
}
if (isset($_POST['setroute']) || $_SESSION['routeset'] == true) {
    $_SESSION['routeset'] = true;
    include 'setRoute.php';
    SetRoute();
}
?>

</html>