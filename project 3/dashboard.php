<?php
session_start();
include 'config.php';

if(!isset($_SESSION['user']))
{
header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
<h1>Admin Dashboard</h1>
</div>

<div class="nav">
<a href="dashboard.php">Dashboard</a>
<a href="logout.php">Logout</a>
</div>

<div class="container">

<div class="box">
<h2>Customer Orders</h2>

<table>
<tr>
<th>ID</th>
<th>Full Name</th>
<th>Email</th>
<th>Phone</th>
<th>Menu</th>
<th>Address</th>
<th>Date</th>
</tr>

<?php
$sql = "SELECT * FROM orders";
$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['fullname']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['menu_item']; ?></td>
<td><?php echo $row['address']; ?></td>
<td><?php echo $row['order_date']; ?></td>
</tr>

<?php } ?>

</table>
</div>


<div class="box">
<h2>Customer Messages</h2>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Location</th>
<th>Message</th>
</tr>

<?php
$sql2 = "SELECT * FROM contacts";
$result2 = mysqli_query($conn,$sql2);

while($row=mysqli_fetch_assoc($result2))
{
?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['fullname']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['location']; ?></td>
<td><?php echo $row['message']; ?></td>
</tr>

<?php } ?>

</table>

</div>

</div>

<div class="footer">
Copyright 2026 Hotel
</div>

</body>
</html>