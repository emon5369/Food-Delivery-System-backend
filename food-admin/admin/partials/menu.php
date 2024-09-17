<?php 
    include('../config/constants.php'); 
    include('login-check.php');
?>

<html>
    <head>
        <title>Food Order Website - Home Page</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="menu">
            <div class="wrapper flex">
                <a href="index.php"><img class="logo" src="./img/logo.png" alt="logo"></a>
                <ul class="flex">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-food.php">Food</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
