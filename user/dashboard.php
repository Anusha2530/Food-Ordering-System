<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>User Dashboard</title>

    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>

<h1>User Dashboard</h1>

<h3>
    Welcome
    <?php echo $_SESSION['user']; ?>
</h3>

<br><br>

<a href="products.php">
    View Products
</a>

<br><br>

<a href="cart.php">
    My Cart
</a>

<br><br>

<a href="orders.php">
    My Orders
</a>

<br><br>

<a href="../auth/logout.php">
    Logout
</a>

</body>
</html>