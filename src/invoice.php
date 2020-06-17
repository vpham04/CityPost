<?php
function Invoice()
{
    include_once 'connect.php';
    $conn = OpenCon();

    echo "<h1 class='title'>How much a customer spent</h1>";

    $sql = "SELECT CID, SUM(Cost) AS TotalSpent FROM Invoice GROUP BY CID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
        <tr>
            <th id='title' class='border-class'>CID</th>
            <th id='title' class='border-class'>Cost</th>
        </tr>";
        while ($row = $result->fetch_assoc()) {
            echo
                "<tr>
            <td class='border-class'>" . $row["CID"] . "</td>
            <td class='border-class'>" . $row["TotalSpent"] . "</td>
        </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    CloseCon($conn);
}
