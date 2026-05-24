<?php
include("../config/database.php");
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../auth/login.php");
    exit();
}

// Add product to cart
if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    $product = mysqli_fetch_assoc($result);

    $_SESSION['cart'][] = $product;
}

// Remove item from cart
if(isset($_GET['remove']))
{
    $remove_id = $_GET['remove'];

    unset($_SESSION['cart'][$remove_id]);

    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Cart</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <style>

        table{
            width: 90%;
            margin: auto;
            background: white;
            border-collapse: collapse;
        }

        th, td{
            padding: 10px;
            border: 1px solid gray;
            text-align: center;
        }

        img{
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

    </style>

</head>
<body>

<h1>Your Cart</h1>

<table>

<tr>
    <th>Image</th>
    <th>Product</th>
    <th>Price</th>
    <th>Action</th>
</tr>

<?php

$total = 0;

if(isset($_SESSION['cart']))
{
    foreach($_SESSION['cart'] as $key => $item)
    {
        $total += $item['price'];
?>

<tr>

    <td>
        <img src="../uploads/<?php echo $item['image']; ?>">
    </td>

    <td>
        <?php echo $item['product_name']; ?>
    </td>

    <td>
        ₹<?php echo $item['price']; ?>
    </td>

    <td>
        <a href="cart.php?remove=<?php echo $key; ?>">
            Remove
        </a>
    </td>

</tr>

<?php
    }
}
?>

<tr>
    <td colspan="2"><strong>Total</strong></td>

    <td colspan="2">
        ₹<?php echo $total; ?>
    </td>
</tr>

</table>

<br>

<a href="checkout.php">
    <button>Proceed to Checkout</button>
</a>

</body>
</html>