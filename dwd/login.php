<?php 

    session_start();

    require('configure.php');

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $select = "SELECT * FROM users WHERE username = '$username'";

        $result = mysqli_query($connect, $select);

        if(mysqli_num_rows($result) === 1){
            
            $row = mysqli_fetch_assoc($result);
            
            if(password_verify($password, $row['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $username;
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
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="/assets/image/logweb.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="login.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <h1>Login</h1>
        <hr>
        <form action="" method="post">
            <div class="login-form">
                <div class="input-box" id="username">
                    <label for="username">Username: </label><br>
                    <input type="text" name="username" id="username" required><br>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box" id="password">
                    <label for="password">Password: </label><br>
                    <input type="password" name="password" id="password" required><br>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot password</a>
                </div>
                <button type="submit" class="btn" name="submit">Login</button>
                <div class="register-link">
                    <p>Don't have an account? <a href="register.php">Register!</a></p>
                </div>
            </div>
        </form>
    </div>
</body>

</html>