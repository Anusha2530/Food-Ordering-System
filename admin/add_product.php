<?php
include("../config/database.php");
session_start();

// optional: admin check (basic)
if(!isset($_SESSION['user']))
{
    header("Location: ../auth/login.php");
    exit();
}

if(isset($_POST['add_product']))
{
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // image upload
    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];

    $folder = "../uploads/" . $image;

    $sql = "INSERT INTO products(product_name, price, description, image)
            VALUES('$name', '$price', '$description', '$image')";

    if(mysqli_query($conn, $sql))
    {
        move_uploaded_file($temp, $folder);
        echo "Product Added Successfully!";
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h1>Add Product</h1>

<form method="POST" enctype="multipart/form-data">

    <input type="text" name="product_name" placeholder="Product Name" required>
    <br><br>

    <input type="text" name="price" placeholder="Price" required>
    <br><br>

    <textarea name="description" placeholder="Description" required></textarea>
    <br><br>

    <input type="file" name="image" required>
    <br><br>

    <button type="submit" name="add_product">Add Product</button>

</form>

</body>
</html>