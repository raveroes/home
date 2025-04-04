<?php 

    require('configure.php');

    if( isset($_POST['submit'] ) ){
        if(create_user($_POST) > 0){
            echo "  <script>
                        alert('Registrasi telah berhasil! Langsung Login!');
                        document.location.href = 'login.php';
                    </script>";
        }
        else{
            echo "  <script>
                        alert('Registrasi Gagal!');
                    </script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
    <link rel="icon" href="/assets/image/logweb.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="register.js"></script>
</head>

<body>
    <div class="wrapper">
        <h1>Register</h1>
        <hr>
        <form action="" method="post">
            <div class="register-form">
                <div class="input-box" id="username">
                    <label for="username">Username :</label><br>
                    <input type="text" name="username" id="username" required><br>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box" id="gmail">
                    <label for="email">Email :</label><br>
                    <input type="email" name="email" id="email"><br>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box" id="password">
                    <label for="password">Password :</label><br>
                    <input type="password" name="password" id="password"><br>
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <div class="input-box" id="confirmation password">
                    <label for="password_confirm">Confirm Password :</label><br>
                    <input type="password" name="password_confirm" id="password_confirm"><br>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="terms-and-condition">
                    <label><input type="checkbox">I accaept all terms and condition</label>
                </div>
                <button type="submit" name="submit" class="btn">Register</button>

                <div class="register-link">
                    <p>Have an account? <a href="login.php">Login</a></p>
                </div>

            </div>
        </form>
    </div>

</html>