<?php
session_start()
?>

<!DOCTYPE html>
<html>

<head>
    <title>Schedule</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .border-class {
            width: 35%;
            font-size: 25px;
            border-bottom-style: solid;
            border-bottom-color: black;
            border-bottom-width: 3px;
        }

        #title {
            text-align: left;
        }

        .header {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Schedule</h1>
        <div class="account">
            <button onclick="window.location.href='<?php echo $_SESSION['returnpage']; ?>'" class="account-button">Go back</button>
        </div>
    </div>
</body>

</html>

<?php

include 'connect.php';
$conn = OpenCon();

$sql = "SELECT Name, s.Date, st.StartTime, st.EndTime
FROM Employee e
LEFT OUTER JOIN ScheduledEmployee se ON e.SSN = se.SSN
LEFT OUTER JOIN Schedule s ON s.ScheduleID = se.ScheduleID
LEFT OUTER JOIN ScheduleTime st ON st.SSN = e.SSN";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
        <tr>
            <th id='title' class='border-class'>Name</th>
            <th id='title' class='border-class'>Date</th>
            <th id='title' class='border-class'>StartTime</th>
            <th id='title' class='border-class'>EndTime</th>
        </tr>";
    while ($row = $result->fetch_assoc()) {
        echo
            "<tr>
            <td class='border-class'>" . $row["Name"] . "</td>
            <td class='border-class'>" . $row["Date"] . "</td>
            <td class='border-class'>" . $row["StartTime"] . "</td>
            <td class='border-class'>" . $row["EndTime"] . "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
CloseCon($conn);
