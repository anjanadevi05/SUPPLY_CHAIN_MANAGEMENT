<?php include('server.php')?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta  name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>SUPPLY CHAIN MANAGEMENT SYSTEM</title>
        <link rel="stylesheet" href="style.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <div class="wrapper">
            <div class="form-box login">
                <form id="loginForm" action='server.php'  method="post">
                <?php include('errors.php'); ?>
                    <h1>LOGIN</h1>
                    <div class="input-box">
                       <label for="username">Username</label>
                       <input type="text" id="username" placeholder="Username" name="Username" required> 
                       <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        <label for="password">Password</label>
                        <input type="password" id="password" placeholder="Password" name="password" required> 
                        <i class='bx bxs-lock-alt'></i>
                     </div>
                     <div class="remember-forgot">
                      <label><input type="checkbox">Remember me</label>
                       <a href="#">Forgot Password?</a>
                     </div>
                        <button type="submit" name="login_user" class="btn">Login</button>
                     <div class="register-link">
                        <p>Don't have an account? <a href="register.php">Register</a> </p>
                     </div>
                </form>
            </div>
        </div>
    </body>