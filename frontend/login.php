<?php
include 'config/database.php';

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
      $_SESSION['name'] = $user['name'];
      return true;
   } else {
      return false;
   }
}

if (isset($_POST['login'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];

   if (login($username, $password, $conn)) {
      header('location:index.php');
      exit();
   } else {
      $error = '<script>alert("Username atau password salah!");</script>';
      echo $error;
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="public/css/login.css">

   <title>Login Page</title>
</head>

<body>

   <div class="container">

      <div class="left">
         <div class="wadah-img">
            <img src="public/image/Two factor authentication-pana.png" alt="login">
         </div>
      </div>

      <div class="right">
         <div class="wadah">
            <h3>Welcome back,</h3>
            <h2>Sign In,</h2>

            <div class="img-mobile">
            <img src="public/image/Two factor authentication-pana.png" alt="login-mobile">
            </div>


            <form method="post">
               <label for="">Username</label><br>
               <div class="boxx">
                  <input class="user" type="text" name="username" placeholder="Enter Username" required>
               </div>
               <br>
               <label for="">Password</label><br>
               <div class="box">
                  <input class="pw" type="password" id="fakePassword" name="password" placeholder="Enter Password" required>
                  <ion-icon name="eye-outline" id="toggler"></ion-icon>
               </div>
               <br>

               <div class="btn">
                  <input type="submit" name="login" value="Sign In,">
               </div>
            </form>
         </div>
      </div>
   </div>

   <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   <script src="public/js/login.js"></script>
</body>

</html>