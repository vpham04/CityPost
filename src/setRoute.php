<?php
include_once 'connect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Set A Route</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .border-class {
            width: 35%;
            font-size: 25px;
            border-bottom-style: solid;
            border-bottom-color: black;
            border-bottom-width: 3px;
        }

        .header {
            text-align: left;
        }

        .routes-table {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- <div class="header">
        <h1>Set A Route</h1>
        <div class="account">
            <button onclick="window.location.href='<?php echo $_SESSION['returnpage']; ?>'" class="account-button">Go back</button>
        </div>
        <?php
        $conn = OpenCon();
        $SSN = "SELECT SSN from Accounts A where A.username = '" . $_SESSION['username'] . "'";
        $resultSSN = $conn->query($SSN);
        $row = $resultSSN->fetch_assoc();
        $SSN = $row['SSN'];
        echo "Hello Manager " . $_SESSION['username'];

        CloseCon($conn);
        ?>
    </div> -->
    <h1 class="title">Set route</h1>
    <div class="parcel-form">
        <form action="addRoute.php" method="post">
            <label for="Distance">Distance</label>
            <input type="text" name="Distance"><br><br>
            <label for="SSN">Employee SSN:</label>
            <select type="SSN" name="SSN">
                <?php
                $conn = OpenCon();
                $ESSN = "SELECT SSN from Courier";
                $result = $conn->query($ESSN);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['SSN'] . "'>" . $row['SSN'] . "</option>";
                    }
                }
                CloseCon($conn);
                ?>
            </select>
            <br><br>
            <input name="addParcel" type="submit" value="Set Route for Employee">
        </form>
    </div>
    <div class="routes-table">
        <?php
        function SetRoute()
        {
            $conn = OpenCon();


            /* $SSN = "SELECT SSN from Accounts A where A.username = '".$_SESSION['username']."'";
            $resultSSN = $conn->query($SSN);
            $row = $resultSSN->fetch_assoc();
            $SSN = $row['SSN']; */
            $sql = "SELECT RID, Distance, SSN  FROM AssignedRoute AR";
            $resultAR = $conn->query($sql);

            if ($resultAR->num_rows > 0) {

                echo "<table>
                <tr>
                    <th id='title' class='border-class'>RID</th>
					<th id='title' class='border-class'>Distance</th>
					<th id='title' class='border-class'>SSN</th>

                </tr>";
                while ($row = $resultAR->fetch_assoc()) {
                    echo
                        "<tr>
                    <td class='border-class'>" . $row["RID"] . "</td>
					<td class='border-class'>" . $row["Distance"] . "</td>
					<td class='border-class'>" . $row["SSN"] . "</td>

                </tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            CloseCon($conn);
        }
        ?>
        <div>

</body>

</html>