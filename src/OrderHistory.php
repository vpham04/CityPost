<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <Title>Order History</Title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="header">
        <h1>Order History</h1>
        <div class="back">
            <button onclick="window.location.href='../src/customer.php'" class="go-back-button">Go Back</button>
        </div>
    </div>

    <div class="result_table">
        <?php
        include 'connect.php';
        $conn = OpenCon();

        $sql = "SELECT op.oid, od.ShippingAddress, oo.ReturnAddress, oon.Date as Date1, oe.Date as Date2, os.Status
                FROM OrderedParcel op, customer c, accounts a, OrderDest od, OrderOrig oo, OrderedOn oon, OrderETA oe, OrderStatus os
                where op.cid = c.cid
                    and c.cid = a.cid
                    and a.username = '".$_SESSION["username"]."'
                    and op.oid = od.oid
                    and op.oid = oo.oid
                    and op.oid = oon.oid
                    and op.oid = oe.oid
                    and op.oid = os.oid";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table>
                <tr>
                    <th class='border-class'>OrderID</th>
                    <th class='border-class'>Destination</th>
                    <th class='border-class'>Return Address</th>
                    <th class='border-class'>Ordered On</th>
                    <th class='border-class'>ETA</th>
                    <th class='border-class'>Status</th>
                </tr>";
            while ($row = $result->fetch_assoc()) {
                echo
                    "<tr>
                    <td class='border-class'>" .$row["oid"]. "</td>
                    <td class='border-class'>" .$row["ShippingAddress"]. "</td>
                    <td class='border-class'>" .$row["ReturnAddress"]. "</td>
                    <td class='border-class'>" .$row["Date1"]. "</td>
                    <td class='border-class'>" .$row["Date2"]. "</td>
                    <td class='border-class'>" .$row["Status"]. "</td>
                    ";
            }
        } else {
            echo "0 results";
        }
        CloseCon($conn);
        ?>
    </div>
</body>

</html>