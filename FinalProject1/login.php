<?php
session_start(); // ✅ Add this at the very top

include("connection.php");
$msg = '';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select1 = "SELECT * FROM `USERS` WHERE email = '$email' AND password= '$password'";
    $select_user = mysqli_query($conn, $select1);

    if (mysqli_num_rows($select_user) > 0) {
        $row1 = mysqli_fetch_assoc($select_user);
        if ($row1['user_type'] == 'user') {
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_type'] = 'user';
            $_SESSION['email'] = $row1['email'];
            $_SESSION['id'] = $row1['id'];
            header('Location: index.php');
            exit;
        } elseif ($row1['user_type'] == 'admin') {
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_type'] = 'admin';
            $_SESSION['email'] = $row1['email'];
            $_SESSION['id'] = $row1['id'];
            header('Location: index.php');
            exit;
        }
    } else {
        $msg = "Incorrect email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.main.css">
    <style>
       
    </style>
</head>
<body>
    <div class="form">
        <form action="" method="post">
            <h2>Log In</h2>
            <p class="msg"></p>
            <div class="form-group">
                <input type="email" name="email" placeholder="Enter your email" class="form-control" required=>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Enter your password" class="form-control" required=>
            </div>
            <button class="btn font-weight-bold" name="submit">login now</button>
            <p>Don't have an accounnt?<a href="register.php">Register now</a></p>
        </form>
    </div>
</body>
</html>