<?php
include("../config/database.php");
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../auth/login.php");
    exit();
}

$sql = "SELECT orders.*, users.name
        FROM orders
        JOIN users
        ON orders.user_id = users.id
        ORDER BY orders.id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>

    <title>View Orders</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <style>

        table{
            width: 90%;
            margin: auto;
            background: white;
            border-collapse: collapse;
        }

        th, td{
            border: 1px solid gray;
            padding: 10px;
            text-align: center;
        }

    </style>

</head>
<body>

<h1>All Orders</h1>

<table>

<tr>
    <th>Order ID</th>
    <th>User Name</th>
    <th>Total Price</th>
    <th>Order Date</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['name']; ?></td>

    <td>₹<?php echo $row['total_price']; ?></td>

    <td><?php echo $row['order_date']; ?></td>

</tr>

<?php
}
?>

</table>

</body>
</html>