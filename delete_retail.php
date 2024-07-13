<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) { 
    $delete_id = $_POST['delete_id'];
    $conn = new mysqli('localhost', 'root', '', 'supply_chain'); 

    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); 
    } 

    // Delete record from the retailer table
    $sql_delete = "DELETE FROM retailer WHERE ret_id = '$delete_id'";
    if ($conn->query($sql_delete) === TRUE) { 
        $conn->close();
        header('Location: Retailer.php'); // Redirect to Retailer.php after deleting retailer
        exit();
    } else { 
        echo "Error deleting record: " . $conn->error; 
    } 

    $conn->close();
} 
?> 

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Delete Retailer</title> 
    <style> 
        body { 
            background-color: #606060FF; 
            color: black; 
            font-weight: bolder; 
            font-family: Arial, sans-serif; 
            text-align: center; 
            margin: 0; 
            padding: 20px;
            background: url(customer.png) no-repeat;
            background-size: cover;
            backdrop-filter: blur(20px);
            height: 110vh;

        } 
        form { 
            max-width: 600px; 
            margin: 0 auto; 
            background-color: transparent; 
            padding: 20px; 
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        } 
        h2{ 
            background-color:#D6ED17FF; 
            padding: 1%; 
            border-radius: 35px; 
        } 
        label { 
            display: block; 
            margin: 10px 0; 
            text-align: left; 
        } 
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        ul li {
            display: inline-block;
            margin-top: 30px;
            justify-content: center;
            align-items: center;
            width: 150px;
            height: 60px;
            list-style-type: none;
            background:black;
            border:none;
            outline: none;
            border-radius: 40px;
            box-shadow:0 0 10px rgba(0,0,0,.1);
            cursor: pointer;
            font-size: 16px;
            color:white;
            font-weight: 600;
            align-content:center;
            align-items: center;
            text-decoration: none;
        }
        input[type="text"], 
        input[type="number"], 
        select, 
        textarea, 
        input[type="number"],
        input[type="tel"] { 
            width: 100%; 
            margin: 5px 0; 
            padding: 10px; 
            border-radius: 5px; 
            border: 1px solid #606060FF; 
            box-sizing: border-box; 
        } 
        input[type="submit"] { 
            background-color: transparent; 
            color: white; 
            cursor: pointer; 
            font-size: 22px;
            border:none;
        }
        .delete-form input[type="submit"] {
            margin-top: 10px;
            background: black;
            color: white;
        }
    </style> 
</head> 
<body> 
    <h2>Delete Retailer</h2> 
    <form method="post" action="" class="delete-form"> 
        <label for="delete_id">Retailer ID to Delete:</label> 
        <input type="number" name="delete_id" required> 

        <input type="submit" name="delete" value="Delete Retailer">
    </form> 
</body> 
</html>
