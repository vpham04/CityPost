<!DOCTYPE html>
<html>
    <head>
        <Title>Order History</Title>
        <style>
            .header {
            background-color: rgb(102, 102, 102);
            padding: 40px 40px 40px 40px;
            margin: 0px;
            }

            body {
                background-color: #8cd38c;
                margin: 0px;
                padding: 0px;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <h1>Order History</h1>
        </div>
        <div class="result_table">
            <?php
                include 'connect.php';
                $conn = OpenCon();
                echo "Connected Successfully<br>";      // Debug statement
                // TODO: get current users cid
                // TODO: query to find more information about packages. (ie. #packages, locations, etc)
                $sql = "select oid
                from OrderedParcel op, customer c
                where op.cid = c.cid";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "OID: " .$row["oid"]. "<br>";
                    }
                } else {
                    echo "0 results";
                }
                CloseCon($conn);
            ?>
        </div>
    </body>
</html>