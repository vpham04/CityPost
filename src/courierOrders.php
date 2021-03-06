<?php
?>

<!DOCTYPE html>
<html>

<head>
    <title>Orders</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .border-class {
            width: 35%;
            font-size: 25px;
            border-bottom-style: solid;
            border-bottom-color: black;
            border-bottom-width: 3px;
        }
    </style>
</head>

</html>

<?php
function Orders() {
    

$conn = OpenCon();

    $sql = "SELECT * FROM OrderStatus";
    $result = $conn->query($sql) or die($conn->error);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th class='border-class'>OID</th>
                    <th class='border-class'>Status</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo
                "<tr>
                    <td class='border-class'>" . $row["OID"] . "</td>
                    <td class='border-class'>" . $row["Status"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No employees";
    }

CloseCon($conn);
}
