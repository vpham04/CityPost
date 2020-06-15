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
        session_start();

        include 'connect.php';
        $conn = OpenCon();
        echo "Connected Successfully<br>";      // Debug statement
        // TODO: query to find more information about packages. (ie. #packages, locations, etc)
        // Want to display: OID, location from, location to, ETA, #packages, Status 
        // TODO: insert results into an html table

        $sql = "select op.oid, od.ShippingAddress, oo.ReturnAddress
                from OrderedParcel op, customer c, accounts a, OrderDest od, OrderOrig oo
                where op.cid = c.cid
                    and c.cid = a.cid
                    and a.username = '".$_SESSION["username"]."'
                    and op.oid = od.oid
                    and op.oid = oo.oid";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "OID: " .$row["oid"]. " Order Dest: " .$row["ShippingAddress"]. "Return Address: " .$row["ReturnAddress"].  "<br>";
            }
        } else {
            echo "0 results";
        }
        CloseCon($conn);
        ?>
    </div>
</body>

</html>