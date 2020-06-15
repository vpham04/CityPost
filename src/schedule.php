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
            <th class='border-class'>Name</th>
            <th class='border-class'>Date</th>
            <th class='border-class'>StartTime</th>
            <th class='border-class'>EndTime</th>
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
