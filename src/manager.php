<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manager Page</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- TODO: Make welcome page like customer using saved session name -->

    <div class="header">
        <h1>Manager Control Panel</h1>
        <?php
        $_SESSION['returnpage'] = '../src/manager.php';
        echo "Welcome Manager " . $_SESSION["username"] . "<br/>";
        ?>
        <div class="account">
            <button onclick="window.location.href='../src/login.html'" class="account-button">Logout</button>
            <button onclick="window.location.href='../src/updatepassword.html'" class="account-button">Change Password</button>
            <button onclick="window.location.href='../src/schedule.php'" class="account-button">See Schedule</button>
        </div>
    </div>
    <?php

    include 'connect.php';
    $conn = OpenCon();

    $sql = "SELECT * FROM Employee";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
            <tr>
                <th class='border-class'>SSN</th>
                <th class='border-class'>Name</th>
                <th class='border-class'>Gender</th>
                <th class='border-class'>Age</th>
                <th class='border-class'>Email</th>
                <th class='border-class'>PhoneNumber</th>
                <th class='border-class'>HomeAddress</th>
            </tr>";
        while ($row = $result->fetch_assoc()) {
            echo
                "<tr>
                <td class='border-class'>" . $row["SSN"] . "</td>
                <td class='border-class'>" . $row["Name"] . "</td>
                <td class='border-class'>" . $row["Gender"] . "</td>
                <td class='border-class'>" . $row["Age"] . "</td>
                <td class='border-class'>" . $row["Email"] . "</td>
                <td class='border-class'>" . $row["PhoneNumber"] . "</td>
                <td class='border-class'>" . $row["HomeAddress"] . "</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    ?>
    <form action="../src/terminate.php" method="post">
        <label>Terminate:</label>

        <?php
        $employee = "SELECT SSN, Name FROM Employee";
        $all_employee = $conn->query($employee);
        echo "<select name='employee'>";
        while ($emp_row = $all_employee->fetch_assoc()) {
            unset($employeename, $employeessn);
            $employeename = $emp_row['Name'];
            $employeessn = $emp_row['SSN'];
            echo '<option value="' . $employeessn . '">' . $employeename . "SSN:" . $employeessn . '</option>';
        }
        echo "</select>";
        CloseCon($conn);
        ?>
        <input type="submit" value="Terminate Employee">
    </form>
</body>

</html>