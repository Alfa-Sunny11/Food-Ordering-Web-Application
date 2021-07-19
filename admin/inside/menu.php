<?php
    include('../configure/config.php');
    include('login_check.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <title>Comida</title>
</head>
<body>
    <!--menu starts-->
    <div>
        <div class = "wrapper">
            <ul class = "menu">
                <li><a href = "index.php">Home</a>
                <li><a href = "category.php">Category</a>
                <li><a href = "food.php">Food</a>
                <li><a href = "order.php">Order</a>
                <li><a href = "manage.php">Admin</a>
                <li><a href = "logout.php">Logout</a>
            </ul>

        </div>
    </div>
    <!--menu ends-->