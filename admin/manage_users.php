<?php
include("../config/database.php");
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ../auth/login.php");
    exit();
}

// Delete User
if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    $delete_sql = "DELETE FROM users WHERE id='$id'";

    mysqli_query($conn, $delete_sql);

    header("Location: manage_users.php");
    exit();
}

// Fetch Users
$sql = "SELECT * FROM users ORDER BY id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>

    <title>Manage Users</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <style>

        table{
            width: 90%;
            margin: auto;
            background: white;
            border-collapse: collapse;
        }

        th, td{
            border: 1px solid gray;
            padding: 10px;
            text-align: center;
        }

        a{
            text-decoration: none;
            color: red;
        }

    </style>

</head>
<body>

<h1>Manage Users</h1>

<table>

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
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
        <?php echo $row['name']; ?>
    </td>

    <td>
        <?php echo $row['email']; ?>
    </td>

    <td>
        <a href="manage_users.php?delete=<?php echo $row['id']; ?>">
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