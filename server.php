
<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$mobile="";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'login_detail');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $mobile = mysqli_real_escape_string($db, $_POST['mobile']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }
    if (empty($mobile)) { array_push($errors, "Mobile number is required"); }
    elseif (!preg_match("/^[0-9]{10}$/", $mobile)) { 
        // Check if mobile number is valid
        array_push($errors, "Invalid mobile number format");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE User_name='$username' OR User_mail='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) { // if user exists
        if ($user['User_name'] === $username) {
            array_push($errors, "Username already exists");
        }
        if ($user['User_mail'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password);//encrypt the password before saving in the database
        $query = "INSERT INTO users (User_name, User_mail, User_mobile, Password) 
                VALUES('$username', '$email', '$mobile', '$password')";
        mysqli_query($db, $query);
        $_SESSION['User_name'] = $username;
        $_SESSION['success'] = "You are now registered";
        header('location: hompage.php');
        exit(); // Stop execution after redirection
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['Username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE User_name='$username' AND Password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['User_name'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: hompage.php');
            exit(); // Stop execution after redirection
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
    
}

?>