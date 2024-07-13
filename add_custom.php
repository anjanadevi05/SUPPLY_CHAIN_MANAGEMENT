<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $name = $_POST['name']; 
    $city = $_POST['city']; 
    $mobile = $_POST['mobile']; 
    $pay = $_POST['payid']; 
    $prodid= $_POST['prodid']; 

    $conn = new mysqli('localhost', 'root', '', 'supply_chain'); 

    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); 
    } 
    $sql = "INSERT INTO customers (cust_name, cust_add,cust_no, payId, prodId)  
        VALUES ('$name', '$city', '$mobile', '$pay', '$prodid')";
     if ($conn->query($sql) === TRUE) { 
        $conn->close();
        header('Location: Customer.php'); // Redirect to Customer.php after adding customer
        exit();
    }else { 
        echo "Error: " . $sql . "<br>" . $conn->error; 
    } 

    $conn->close(); 
} 
?> 

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Add Customer</title> 
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
    </style> 
</head> 
<body> 
    <h2>Add Customer</h2> 
    <form method="post" action=""> 
        <label for="name">Name:</label> 
        <input type="text" name="name" required> 

        <label for="city">City:</label> 
        <input type="text" name="city" required> 

        <label for="mobile">Mobile Number:</label> 
        <input type="tel" name="mobile" required>  

        <label for="payid">Payment ID:</label> 
        <input type="number" name="payid" required> 

        <label for="prodid">Product ID:</label> 
        <input type="number" name="prodid" required> 

        <ul>
        <li>
        <input type="submit" value="Add Customer">
        </li>
     </ul>
    </form> 
</body> 
</html>
