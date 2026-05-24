<!DOCTYPE html>
<html>
<head>

    <title>Food Ordering System</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <style>

        body{
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff9966, #ff5e62);
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container{
            margin-top: 100px;
        }

        h1{
            color: white;
            font-size: 45px;
            margin-bottom: 20px;
        }

        p{
            color: white;
            font-size: 20px;
            margin-bottom: 40px;
        }

        .buttons a{
            text-decoration: none;
        }

        .buttons button{
            width: 220px;
            padding: 15px;
            margin: 10px;
            border: none;
            border-radius: 10px;
            background: white;
            color: #ff6600;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .buttons button:hover{
            background: orange;
            color: white;
        }

    </style>

</head>
<body>

<div class="container">

    <h1>Food Ordering System</h1>

    <p>
        Order Delicious Food Online
    </p>

    <div class="buttons">

        <a href="auth/register.php">
            <button>Register</button>
        </a>

        <a href="auth/login.php">
            <button>Login</button>
        </a>

        <a href="user/products.php">
            <button>View Products</button>
        </a>

        <a href="admin/dashboard.php">
            <button>Admin Dashboard</button>
        </a>

    </div>

</div>

</body>
</html>