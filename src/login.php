<?php
include 'connect.php';
$conn = OpenCon();

$username = $_POST['username'];
$password = $_POST['password'];
$printname;

$sql = "SELECT Username, Password FROM Accounts
WHERE Username = '$username' AND Password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $printname = $username;
} else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    $printname = 'Account not found';
}
CloseCon($conn);
?>

<html>

<head>
    <title>Welcome To CityPost</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Welcome!
        <br />
        <?php echo "<div id='username'> $printname </div>" ?>
    </h1>
    <form action="login.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="text" name="password" placeholder="password">
        <br />
        <input type="submit" value="Login">
    </form>
    <button onclick="window.location.href='/src/makeaccount.html';">
        Sign up
    </button>
    <br />
    <a href="/src/login.html">Logout</a>
    <br />
    <a href="/src/main.html">Go back</a>
    <br />
    <div id="contact">
        <h2>Contact information</h1>
            <p>Address: 123 Main Street Vancouver, BC, Canada | Email:city@post.ca | Phone: (123) 456-7890 </p>
    </div>
</body>

</html>