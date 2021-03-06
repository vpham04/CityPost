<!DOCTYPE html>
<html>

<head>
    <title>Schedule</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .border-class {
            font-size: 25px;
        }
    </style>
</head>

<body>
</body>

</html>

<?php
function Schedule()
{
    include_once 'connect.php';
    $conn = OpenCon();

    $date = $_POST['date'];
    // if ($date == "clear") {
    //     exit;
    // } else {

    echo "<h1 class='title'>Schedule</h1>";

    $sql = "SELECT Name, s.Date, st.StartTime, st.EndTime
        FROM Employee e
        LEFT OUTER JOIN ScheduledEmployee se ON e.SSN = se.SSN
        LEFT OUTER JOIN Schedule s ON s.ScheduleID = se.ScheduleID
        LEFT OUTER JOIN ScheduleTime st ON st.SSN = e.SSN
        WHERE date='$date'";
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
        echo "No one scheduled";
    }
    CloseCon($conn);
    // }
}
function ScheduleAll()
{
    include_once 'connect.php';
    $conn = OpenCon();

    $date = $_POST['employeeAll'];
    // if ($date == "clear") {
    //     exit;
    // } else {

    echo "<h1 class='title'>Employees Scheduled every week</h1>";

    $sql = "SELECT e.SSN, e.Name
            from Employee e
            where NOT EXISTS (
                select ScheduleID
                from Schedule
                EXCEPT
                (select sc.ScheduleID
                from ScheduledEmployee sc
                where e.SSN = sc.SSN))";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th id='title' class='border-class'>SSN</th>
                    <th id='title' class='border-class'>Name</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo
                "<tr>
                    <td class='border-class'>" . $row["SSN"] . "</td>
                    <td class='border-class'>" . $row["Name"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No one scheduled for every week";
    }
    CloseCon($conn);
}
?>