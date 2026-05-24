<?php
include("../config/database.php");
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../auth/login.php");
    exit();
}

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Products</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        table{
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: white;
        }

        th, td{
            border: 1px solid gray;
            padding: 10px;
            text-align: center;
        }

        img{
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        a{
            text-decoration: none;
            color: blue;
        }
    </style>

</head>
<body>

<h1>All Products</h1>

<table>

    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Action</th>
    </tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td>
        <img src="../uploads/<?php echo $row['image']; ?>">
    </td>

    <td><?php echo $row['product_name']; ?></td>

    <td>₹<?php echo $row['price']; ?></td>

    <td><?php echo $row['description']; ?></td>

    <td>
        <a href="edit_product.php?id=<?php echo $row['id']; ?>">
            Edit
        </a>

        |

        <a href="delete_product.php?id=<?php echo $row['id']; ?>">
            Delete
        </a>
    </td>

</tr>

<?php
}
?>

</table>

</body>
</html>