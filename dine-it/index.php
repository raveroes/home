<?php

    require('config.php');

    session_start();

    if(!isset($_SESSION['login'])){
        header("Location: login.php");
        exit;
    }

    $gmail = $_SESSION['gmail'];
    $no = 1;    
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="index.css">
    <link rel="icon" href="/assets/image/logweb.png">
    <script src="script.js"></script>
    <title>DineIT</title>
</head>
<body>
        <nav>
            <ul class="sidebar">
                <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#e8eaed"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
                <li><a href="#">Service</a></li>
                <li><a href="reservasi.php">Reservation</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
            <ul>
                <li class="logo"><a href="index.php">DineIT</a></li>
                <li class="hideOnMobile"><a href="reservasi.php">Reservation</a></li>
                <li class="hideOnMobile"><a href="#">Service</a></li>
                <li class="hideOnMobile"><a href="#">Contact</a></li>
                <li class="hideOnMobile"><a href="#">About us</a></li>
                <li class="hideOnMobile"><a href="login.php">Login</a></li>
                <li onclick=showSidebar()><a href=""><svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#e8eaed"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
            </ul>
        </nav>
        
            <div class="container1">
                <article>
                    <section id="detail1">
                        <h1>Order Today, We'll Speed Your Way</h1>
                        <p>"Experience the speed of reliable delivery. Order today, like there's no other day!"</p>
                        <a href="reservasi.php" class="btnABT">Reserve Now</a>
                    </section>
                </article>
            </div>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col">
                        <h4>DineIT</h4>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Report</a></li>
                        </ul>
                    </div>
                </div>
            </div>
       </footer>
</body>
