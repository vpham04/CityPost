<?php

include 'connect.php';
$conn = OpenCon();

$sql = "SELECT IID, CID, Cost FROM Invoice";
$result = $conn->query($sql);

$sum = "SELECT SUM(Cost) AS Profit FROM Invoice";
$result1 = $conn->query($sum);

if ($result->num_rows > 0) {
    echo "<table>
        <tr>
            <th id='title' class='border-class'>IID</th>
            <th id='title' class='border-class'>CID</th>
            <th id='title' class='border-class'>Cost</th>
        </tr>";
    while ($row = $result->fetch_assoc()) {
        echo
            "<tr>
            <td class='border-class'>" . $row["IID"] . "</td>
            <td class='border-class'>" . $row["CID"] . "</td>
            <td class='border-class'>" . $row["Cost"] . "</td>
        </tr>";
    }
    echo "</table>";
    $invoicesum = $result1->fetch_assoc();
    echo "Profit sum: " . $invoicesum['Profit'];
} else {
    echo "0 results";
}
CloseCon($conn);
?>