<?php
include("../config/database.php");
session_start();

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password']))
        {
            $_SESSION['user'] = $user['email'];
            $_SESSION['user_id'] = $user['id'];

            header("Location: ../user/dashboard.php");
            exit();
        }
        else
        {
            $error = "Invalid Password";
        }
    }
    else
    {
        $error = "User Not Found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Login</title>

    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>

<div class="form-container">

    <form method="POST">

        <h1>Login</h1>

        <?php
        if(isset($error))
        {
            echo "<p class='error'>$error</p>";
        }
        ?>

        <input type="email"
               name="email"
               placeholder="Enter Email"
               required>

        <input type="password"
               name="password"
               placeholder="Enter Password"
               required>

        <button type="submit" name="login">
            Login
        </button>

        <p>
            Don't have an account?
            <a href="register.php">Register</a>
        </p>

        <p>
            <a href="forgot_password.php">
                Forgot Password?
            </a>
        </p>

    </form>

</div>

</body>
</html>