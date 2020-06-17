<?php
include 'connect.php';
$conn = OpenCon();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee contact</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="header">
        <h1>Contact Info</h1>
        <div class="go-back">
            <button onclick="window.location.href='../src/manager.php'" class="go-back-button">Go back</button>
        </div>
    </div>
    <?php
    if (empty($_POST['contact'])) {
        echo "No option Selected";
        header("refresh:1;url='../src/manager.php'");
    } else {
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
    }
    ?>
</body>
</html>