<?php
include("../config/database.php");
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../auth/login.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM products WHERE id='$id'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update_product']))
{
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $update = "UPDATE products 
               SET product_name='$name',
                   price='$price',
                   description='$description'
               WHERE id='$id'";

    if(mysqli_query($conn, $update))
    {
        header("Location: view_products.php");
        exit();
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

    <title>Edit Product</title>

    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>

<h1>Edit Product</h1>

<form method="POST">

    <input type="text"
           name="product_name"
           value="<?php echo $row['product_name']; ?>"
           required>

    <br><br>

    <input type="text"
           name="price"
           value="<?php echo $row['price']; ?>"
           required>

    <br><br>

    <textarea name="description" required><?php echo $row['description']; ?></textarea>

    <br><br>

    <button type="submit" name="update_product">
        Update Product
    </button>

</form>

</body>
</html>