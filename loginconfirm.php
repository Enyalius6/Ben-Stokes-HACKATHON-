<?php
$email = $_POST['email'];
$password = $_POST['password'];
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "cbp";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM clients WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Compare the entered password with the password in the database
    if ($password == $row['password']) {
        // Passwords match - login successful
        session_start();
        $_SESSION['user_id'] = $row['id'];
        header("Location: mainpage.php");
        exit;
    } else {
        // Passwords don't match - login failed
        echo "Incorrect password";
    }
} else {
    // No user found with the entered email address
    echo "No user found with that email address";
}
?>