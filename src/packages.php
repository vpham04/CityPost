<!DOCTYPE html>
<html>

<head>
    <title>Package</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .border-class {
            width: 35%;
            font-size: 25px;
            border-bottom-style: solid;
            border-bottom-color: black;
            border-bottom-width: 3px;
        }

        /* #title {
            text-align: left;
        }

        .header {
            text-align: center;
        } */
    </style>
</head>

<body>
    <!-- <div class="header">
        <h1>Package</h1>
        <div class="account">
            <button onclick="window.location.href='<?php echo $_SESSION['returnpage']; ?>'" class="account-button">Go back</button>
        </div>
    </div> -->
</body>

</html>

<?php
function Package()
{
    include_once 'connect.php';
    $conn = OpenCon();

    CloseCon($conn);
}
