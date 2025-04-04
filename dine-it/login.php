<?php 

    session_start();

    require('config.php');

    if(isset($_POST['submit'])) {
        $gmail = $_POST['gmail'];
        $password = $_POST['password'];

        $select = "SELECT * FROM users WHERE gmail = '$gmail'";

        $result = mysqli_query($connect, $select);

        if(mysqli_num_rows($result) === 1){
            
            $row = mysqli_fetch_assoc($result);
            
            if(password_verify($password, $row['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['gmail'] = $gmail;
                header("Location: index.php");
                exit;
            }
        }
        echo "  <script>
                    alert('Username atau Password Salah!');
                </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="/assets/image/logweb.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="register.js"></script>
</head>
<body> 
<div class="wrapper">
        <h1>LOGIN</h1>
        <hr>
        <form action="" method="post">
            <div class="login-form">
                <div class="input-box" id="gmail">
                    <label for="gmail">Gmail :</label><br>
                    <input type="gmail" name="gmail" id="gmail"><br>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box" id="password">
                    <label for="password">Password :</label><br>
                    <input type="password" name="password" id="password"><br>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="remember-me">
                    <label><input type="checkbox">Remember Me</label>
                </div>
                <button type="submit" name="submit" class="btn">Login</button>

                <div class="register-link">
                    <p>No Account Yet? <a href="registration.php">Sign Up</a></p>
                </div>

            </div>
        </form>
    </div>
</body>
</html>