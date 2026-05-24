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

    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>

    <form>

        <h1>Admin Dashboard</h1>

        <h3>
            Welcome
            <?php echo $_SESSION['user']; ?>
        </h3>

        <br><br>

        <a href="add_product.php">
            Add Product
        </a>

        <br><br>

        <a href="view_products.php">
            View Products
        </a>
<br><br>

<a href="manage_users.php">
    Manage Users
</a>
        <br><br>

        <a href="../auth/logout.php">
            Logout
        </a>

    </form>

</body>
</html>