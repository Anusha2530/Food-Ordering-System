<?php
include("../config/database.php");
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM orders 
        WHERE user_id='$user_id'
        ORDER BY id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>

    <title>My Orders</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <style>

        table{
            width: 80%;
            margin: auto;
            background: white;
            border-collapse: collapse;
        }

        th, td{
            padding: 12px;
            border: 1px solid gray;
            text-align: center;
        }

    </style>

</head>
<body>

<h1>My Orders</h1>

<table>

<tr>
    <th>Order ID</th>
    <th>Total Price</th>
    <th>Order Date</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

    <td>
        <?php echo $row['id']; ?>
    </td>

    <td>
        ₹<?php echo $row['total_price']; ?>
    </td>

    <td>
        <?php echo $row['order_date']; ?>
    </td>

</tr>

<?php
}
?>

</table>

</body>
</html>