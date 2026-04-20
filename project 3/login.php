<?php
session_start();
include 'config.php';

if(isset($_POST['login']))
{
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{
$_SESSION['user']=$username;
header("Location: dashboard.php");
}
else
{
echo "<script>alert('Login Failed');</script>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
<h1>Admin Login</h1>
</div>

<div class="nav">
<a href="index.php">Home</a>
<a href="about.php">About Us</a>
<a href="menu.php">Menu</a>
<a href="gallery.php">Gallery</a>
<a href="order.php">Order</a>
<a href="contact.php">Contact</a>
<a href="login.php">Login</a>
</div>

<div class="container">
<div class="box">

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="login">Login</button>

</form>

</div>
</div>

<div class="footer">
Copyright 2026 Hotel
</div>

</body>
</html>