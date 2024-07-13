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
        <div class="wrapper1">
            <div class="form-box register">
                <form id="RegisterForm" action="server.php" method="post">
                <?php include('errors.php'); ?>
                    <h1>Registration</h1>
                    <div class="input-box">
                       <label for="username">Username</label>
                       <input type="text" id="username" name="username"  placeholder="Username" required> 
                       <i class='bx bxs-user'></i>
                    </div>
                    
                    <div class="input-box">
                       <label for="email">Email</label>
                       <input type="text" id="email" name="email" placeholder="E-mail"
                       required> 
                       <span class="icon">
                            <i class='bx bxs-envelope'></i>
                        </span>
                    </div>
                    <div class="input-box">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required> 
                        <i class='bx bxs-lock-alt'></i>
                     </div>
                    <div class="input-box">
                        <label for="mobile">Mobile Number</label>
                        <input type="tel" id="mobile" name="mobile" placeholder="Mobile Number"
                        required>
                        <span class="icon">
                            <i class='bx bx-phone'></i>
                        </span>
                    </div>
                        <button type="submit" name=reg_user class="btn">Register</button>
                    <div class="login-link">
                        <p>Already have an account? <a href="login.php">Login</a> </p>
                     </div>
                </form>
            </div>
        </div>
    </body>
</html>