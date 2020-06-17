<?php
include_once 'connect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manager</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .border-class {
            font-size: 18px;
        }

        #delete-button {
            background-color: red;
            border: 2px solid black;
            border-radius: 4px;
            color: white;
            padding: 10px 32px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            transition-duration: 0.4s;
        }

        #delete-button:hover {
            background-color: darkred;
            color: white;
        }

        #list_emp {
            padding: 8px 30px;
        }

        #delete {
            text-align: center;
        }
    </style>
</head>

<body>

    <?php
    function deleteRoute()
    {
        echo "<h1 class='title'>Delete route</h1>";
        $conn = OpenCon();
        $sql = "SELECT ar.RID as RID, sr.SSN as MSSN, Distance, ar.SSN as CSSN FROM AssignedRoute ar, SetsRoute sr
        WHERE ar.RID = sr.RID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
            <tr>
                <th class='border-class'>RID</th>
                <th class='border-class'>Manager that created</th>
                <th class='border-class'>Distance</th>
                <th class='border-class'>Courier assigned</th>
            </tr>";
            while ($row = $result->fetch_assoc()) {
                echo
                    "<tr>
                <td class='border-class'>" . $row["RID"] . "</td>
                <td class='border-class'>" . $row["MSSN"] . "</td>
                <td class='border-class'>" . $row["Distance"] . "</td>
                <td class='border-class'>" . $row["CSSN"] . "</td>
            </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        echo "<div id='delete'>";
        echo "<form action='../src/droproute.php' method='post'>";
        echo "<label>Delete:</label>";

        $conn = OpenCon();
        $route = "SELECT RID FROM AssignedRoute";
        $all_route = $conn->query($route);
        echo "<select id='list_emp' name='route'>";
        while ($route_row = $all_route->fetch_assoc()) {
            unset($routeid);
            $routeid = $route_row['RID'];
            echo '<option value="' . $routeid . '">' . $routeid . '</option>';
        }
        echo "</select>";
        CloseCon($conn);

        echo "<input type='submit' id='delete-button' value='Delete route'>";
        echo "</form>";
        echo "</div>";
    }
    ?>
</body>

</html>