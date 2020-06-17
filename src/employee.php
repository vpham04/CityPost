<!DOCTYPE html>
<html>

<head>
    <title>Employees</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .border-class {
            font-size: 18px;
        }
    </style>
</head>

<body>
</body>

</html>

<?php
function Employee()
{
    include 'connect.php';
    $conn = OpenCon();

    $sql = "SELECT * FROM Employee";
    $result = $conn->query($sql) or die($conn->error);

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
        echo "No employees";
    }
    CloseCon($conn);
}
?>
