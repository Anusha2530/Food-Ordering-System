<?php
include("../config/database.php");
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../auth/login.php");
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id='$id'";

if(mysqli_query($conn, $sql))
{
    header("Location: view_products.php");
    exit();
}
else
{
    echo "Error: " . mysqli_error($conn);
}
?>