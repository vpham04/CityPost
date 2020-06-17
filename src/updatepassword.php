<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update your password</title>
    <link rel="stylesheet" href="styles.css" />
    <style>
        .header {
            text-align: center;
        }

        #input {
            text-align: center;
            top: 50%;
        }

        #password {
            height: 52px;
            width: 250px;
            font-size: 20px;
            vertical-align: middle;
        }

        #button {
            background-color: red;
            border: 2px solid black;
            border-radius: 4px;
            color: white;
            padding: 15px 32px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            transition-duration: 0.4s;
        }

        #button:hover {
            background-color: darkred;
            color: white;
        }
    </style>
</head>

<!-- TODO: Add go back button-->

<body>
    <div class="header">
        <h1>Change your password</h1>
        <button onclick="window.location.href='<?php echo $_SESSION['returnpage']; ?>'" class="account-button">Go back</button>
    </div>
    <form id="input" method="post">
        <input id="password" type="text" name="newpassword" placeholder="New password" />
        <input id="button" name="password" type="submit" value="Submit" />
    </form>

    <?php
    if (isset($_POST['password'])) {
        include 'connect.php';
        $conn = OpenCon();

        $username = $_SESSION["username"];
        $password = $_POST["newpassword"];

        $sql = "UPDATE Accounts 
        SET Password = '$password'
        where Username = '$username'";

        if ($conn->query($sql) == TRUE) {
            // echo "Password changed";
            header('Location: ../src/confirmation.php');
        } else {
            echo "Error: " . $sql . "<br />" . $conn->error;
        }
        CloseCon($conn);
    }
    ?>
</body>

</html>