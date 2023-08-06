<?php
include 'connection.php';

session_start();

function login($username, $password, $conn)
{
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
    $user = mysqli_fetch_assoc($query);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($username, $password, $conn)) {
        header('location: index.php');
        exit();
    } else {
        $error = "Username atau password salah!";
        echo $error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login Page</title>
</head>

<body>

    <div class="container">
        <div class="left">
            <div class="wadah-img">
                <img src="../image/Two factor authentication-pana.png" alt="login">
            </div>
        </div>

        <div class="right">
            <div class="wadah">
                <h3>Welcome back,</h3>
                <h2>Sign In,</h2>


                <form method="post">
                    <label for="">Username</label><br>
                    <input type="text" name="username" placeholder="yourusername" required>
                    <br>
                    <br>
                    <label for="">Password</label><br>
                    <input type="password" name="password" placeholder="********" required>
                    <br>

                    <div class="btn">
                        <input type="submit" name="login" value="Sign In,">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>