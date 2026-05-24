<?php
include("../config/database.php");
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../auth/login.php");
    exit();
}

if(!isset($_SESSION['cart']) || empty($_SESSION['cart']))
{
    echo "Cart is empty!";
    exit();
}

$user_id = $_SESSION['user_id'];

$total = 0;

foreach($_SESSION['cart'] as $item)
{
    $total += $item['price'];
}

// Insert into orders table
$order_sql = "INSERT INTO orders(user_id, total_price)
              VALUES('$user_id', '$total')";

if(mysqli_query($conn, $order_sql))
{
    $order_id = mysqli_insert_id($conn);

    // Insert each product into order_items
    foreach($_SESSION['cart'] as $item)
    {
        $product_id = $item['id'];

        $item_sql = "INSERT INTO order_items(order_id, product_id, quantity)
                     VALUES('$order_id', '$product_id', '1')";

        mysqli_query($conn, $item_sql);
    }

    // Clear cart
    unset($_SESSION['cart']);

    echo "<h1>Order Placed Successfully!</h1>";

    echo "<a href='products.php'>Continue Shopping</a>";
}
else
{
    echo "Error: " . mysqli_error($conn);
}
?>