
<?php 

$conn = new mysqli('localhost', 'root', '', 'supply_chain'); 

if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 
$sql = "SELECT * FROM orders"; 
$result = $conn->query($sql); 
?> 

<!DOCTYPE html> 
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content= "width=device-width, initial-scale=1.0"> 
    <title>Customer Details</title> 

    <style>
    body {
        background-color: #606060FF;
        color: black;
        font-family: Arial, sans-serif;
        text-align: center;
        margin: 0;
        padding: 20px;
        background: url(customer.png) no-repeat;
        background-size: cover ;
        background-position: center;
        backdrop-filter: blur(10px);
        height: 100vh; 
    } 

    h2{
         background-color: #D6ED17FF;
         width: 95%;
         padding: 1%; 
         border-radius: 35px; 
    } 

    table { 
        background-color: transparent;
        width: 97%;
        border-collapse: seperate;
        margin-top: 20px;
        border:none
    } 
    tr{
        margin-bottom: 10px;
    }

    th, td { 
        border: 2px solid black;
        padding: 10px;
        color:black;
        font-size:15px;
        font-weight: bold;
    } 

    th { 
        background-color: brown;
        border:none;
        color:white;
        font-size:20px;
        font-weight: bold;
        } 
    td:not(:last-child),th:not(:last-child) {
    margin-right: 10px;
}
ul {
    list-style-type: none;
    padding: 0;
     margin: 0;
}

ul li a{
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
    </style> 
</head> 
<body> 

    <h2>ORDER DETAILS</h2>
    <table border="1">
        <tr> 
            <th>ORDER ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Id</th>
            <th>Order Date</th>
            <th>Customer ID</th>
        </tr> 

    <?php 

        while ($row = $result->fetch_assoc()) {
            echo "<tr> 
            <td>{$row['order_id']}</td>
            <td>{$row['prod_name']}</td> 
            <td>{$row['prod_price']}</td> 
            <td>{$row['prodId']}</td> 
            <td>{$row['order_date']}</td>
            <td>{$row['cust_Id']}</td>  
             </tr>"; 
        } 

    ?>
     </table>
     <ul>
        <li>
            <a href="add_order.php">Add Order</a>
            <a href="delete_order.php">Delete Order</a>
        </li>
     </ul>
</body> 
</html>

