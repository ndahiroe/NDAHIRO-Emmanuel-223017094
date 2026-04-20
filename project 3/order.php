<?php
include 'config.php';

if(isset($_POST['submit']))
{
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$menu = $_POST['menu'];
$address = $_POST['address'];
$date = $_POST['date'];

$sql = "INSERT INTO orders(fullname,email,phone,menu_item,address,order_date)
VALUES('$fullname','$email','$phone','$menu','$address','$date')";

mysqli_query($conn,$sql);
echo "<script>alert('Order Sent Successfully');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Order Food</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
<h1>Order Online</h1>
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

<select name="menu" required>
<option>Select Menu</option>
<option>Grilled Fish</option>
<option>Fried Fish</option>
<option>Soda</option>
<option>Water</option>
<option>Mango Juice</option>
<option>Orange Juice</option>
</select>

<textarea name="address" placeholder="Address" required></textarea>

<input type="date" name="date" required>

<button type="submit" name="submit">Send Order</button>

</form>

</div>
</div>

<div class="footer">
Copyright 2026 Hotel
</div>

</body>
</html>