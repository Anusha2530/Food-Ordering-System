<?php
include("../config/database.php");

if(isset($_POST['reset']))
{
    $email = $_POST['email'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        header("Location: reset_password.php?email=$email");
        exit();
    }
    else
    {
        echo "Email not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Forgot Password</title>

    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>

<h1>Forgot Password</h1>

<form method="POST">

    <input type="email"
           name="email"
           placeholder="Enter Email"
           required>

    <br><br>

    <button type="submit" name="reset">
        Reset Password
    </button>

</form>

</body>
</html>