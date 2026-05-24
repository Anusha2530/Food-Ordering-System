<?php
include("../config/database.php");

$email = $_GET['email'];

if(isset($_POST['update']))
{
    $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "UPDATE users
            SET password='$new_password'
            WHERE email='$email'";

    if(mysqli_query($conn, $sql))
    {
        echo "Password Updated Successfully!";

        echo "<br><br>";

        echo "<a href='login.php'>Login</a>";
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

    <title>Reset Password</title>

    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>

<h1>Reset Password</h1>

<form method="POST">

    <input type="password"
           name="password"
           placeholder="Enter New Password"
           required>

    <br><br>

    <button type="submit" name="update">
        Update Password
    </button>

</form>

</body>
</html>