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

    <title>Products</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <style>

        .container{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .card{
            background: white;
            width: 250px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
            text-align: center;
        }

        .card img{
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }

        .price{
            color: green;
            font-size: 20px;
            margin: 10px 0;
        }

        button{
            margin-top: 10px;
        }

    </style>

</head>
<body>

<h1>Food Items</h1>

<div class="container">

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<div class="card">

    <img src="../uploads/<?php echo $row['image']; ?>">

    <h2><?php echo $row['product_name']; ?></h2>

    <p class="price">₹<?php echo $row['price']; ?></p>

    <p><?php echo $row['description']; ?></p>

    <a href="cart.php?id=<?php echo $row['id']; ?>">
        <button>Add to Cart</button>
    </a>

</div>

<?php
}
?>

</div>

</body>
</html>