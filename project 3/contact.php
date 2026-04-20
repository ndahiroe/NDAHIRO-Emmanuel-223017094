<?php
include 'config.php';

if(isset($_POST['send']))
{
$name = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$message = $_POST['message'];

$sql = "INSERT INTO contacts(fullname,email,phone,location,message)
VALUES('$name','$email','$phone','$location','$message')";

mysqli_query($conn,$sql);

echo "<script>alert('Message Sent');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Contact Us</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
<h1>Contact Us</h1>
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

<input type="text" name="fullname" placeholder="Full Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="text" name="phone" placeholder="Phone" required>

<input type="text" name="location" placeholder="Location" required>

<textarea name="message" placeholder="Message" required></textarea>

<button type="submit" name="send">Send Message</button>

</form>

</div>
</div>

<div class="footer">
Copyright 2026 Hotel
</div>

</body>
</html>