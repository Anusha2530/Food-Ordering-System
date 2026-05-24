<?php
include("../config/database.php");

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check);

    if(mysqli_num_rows($result) > 0)
    {
        $error = "Email already exists!";
    }
    else
    {
        $sql = "INSERT INTO users(name,email,password)
                VALUES('$name','$email','$password')";

        if(mysqli_query($conn, $sql))
        {
            $success = "Registration Successful!";
        }
        else
        {
            $error = "Something went wrong!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Register</title>

    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>

<div class="form-container">

    <form method="POST">

        <h1>Register</h1>

        <?php
        if(isset($error))
        {
            echo "<p class='error'>$error</p>";
        }

        if(isset($success))
        {
            echo "<p class='success'>$success</p>";
        }
        ?>

        <input type="text"
               name="name"
               placeholder="Enter Name"
               required>

        <input type="email"
               name="email"
               placeholder="Enter Email"
               required>

        <input type="password"
               name="password"
               placeholder="Enter Password"
               required>

        <button type="submit" name="register">
            Register
        </button>

        <p>
            Already have an account?
            <a href="login.php">Login</a>
        </p>

    </form>

</div>

</body>
</html>