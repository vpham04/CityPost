<?php
include 'connect.php';
$conn = OpenCon();

$contact = $_POST['contact'];

$sql = "SELECT Name, $contact FROM Employee";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
        <tr>
            <th id='title' class='border-class'>Name</th>
            <th id='title' class='border-class'>$contact</th>
        </tr>";
    while ($row = $result->fetch_assoc()) {
        echo
            "<tr>
            <td class='border-class'>" . $row["Name"] . "</td>
            <td class='border-class'>" . $row[$contact] . "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "Contact info not found";
}
CloseCon($conn);
