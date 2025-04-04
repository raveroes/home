<?php 

    require('config.php');

    if( isset($_POST['submit'] ) ){
        if(create_user($_POST) > 0){
            echo "  <script>
                        alert('Registrasi telah berhasil! Silahkan Login!');
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
    <title>Registration Page</title>
    <link rel="stylesheet" href="registration.css">
    <link rel="icon" href="/assets/image/logweb.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="register.js"></script>
</head>
<body>

<div>
    <?php 
    if(isset($_POST['submit'])){
        $username = $_POST['username']; 
        $gmail = $_POST['gmail']; 
        $password = $_POST['password']; 

        // Menyimpan data ke database
        $sql = "INSERT INTO users (username, gmail, password) VALUES (?, ?, ?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$username, $gmail, $password]);
        
        if($result){
            echo 'Sign Up Successful. Successfully Saved.';
        }else{
            echo 'There were errors while saving the data.';
        }
    }
    ?>
</div>

<div class="wrapper">
        <h1>REGISTRATION</h1>
        <hr>
        <form action="" method="post">
            <div class="register-form">
                <div class="input-box" id="username">
                    <label for="username">Username :</label><br>
                    <input type="text" name="username" id="username" required><br>
                    <i class='bx bxs-user'></i>
                </div>
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

                <div class="input-box" id="confirmation password">
                    <label for="password_confirm">Confirm Password :</label><br>
                    <input type="password" name="password_confirm" id="password_confirm"><br>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="terms-and-condition">
                    <label><input type="checkbox">I accaept all terms and condition</label>
                </div>
                <button type="submit" name="submit" class="btn">Sign Up</button>

                <div class="register-link">
                    <p>Have an account? <a href="login.php">Login</a></p>
                </div>

            </div>
        </form>
    </div>
</body>
</html>