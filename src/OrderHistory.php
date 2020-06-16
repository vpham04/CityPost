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

        $sql = "SELECT po.oid, od.ShippingAddress, oo.ReturnAddress, oon.Date as Date1, oe.Date as Date2, iv.Cost, os.Status
                FROM PlacedOrder po, Customer c, Accounts a, OrderDest od, OrderOrig oo, OrderedOn oon, OrderETA oe, Invoice iv, OrderStatus os
                where po.cid = c.cid
                    and c.cid = a.cid
                    and a.username = '".$_SESSION["username"]."'
                    and po.oid = od.oid
                    and po.oid = oo.oid
                    and po.oid = oon.oid
                    and po.oid = oe.oid
                    and po.oid = os.oid";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table>
                <tr>
                    <th class='border-class'>OrderID</th>
                    <th class='border-class'>Destination</th>
                    <th class='border-class'>Return Address</th>
                    <th class='border-class'>Ordered On</th>
                    <th class='border-class'>ETA</th>
                    <th class='border-class'>Price</th>
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
                    <td class='border-class'>" .$row["Cost"]. "</td>
                    <td class='border-class'>" .$row["Status"]. "</td>
                    </tr>";
            }
        } else {
            echo "0 results";
        }
        CloseCon($conn);
        ?>
    </div>
</body>

</html>