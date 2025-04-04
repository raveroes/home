<?php 

$db_user = 'root';
$db_pass = '';
$db_name = 'dineit';

$connect = mysqli_connect('localhost','root','','dineit');

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=" . $db_name . ';charset=utf8', $db_user , $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

function create_user($data)
    {
        global $connect;

        $username = htmlspecialchars($data['username']);
        $gmail = htmlspecialchars($data['gmail']);
        $password = htmlspecialchars($data['password']);
        $password_confirm = htmlspecialchars($data['password_confirm']);

        if($password !== $password_confirm){
            echo "  <script>
                        alert('Password yang Anda input tidak sama!');
                    </script>";
        }
        
        $password = password_hash($password, PASSWORD_ARGON2ID);
        
        $query = "INSERT INTO users (username, gmail, password) VALUES ('$username', '$gmail', '$password')";

        mysqli_query($connect, $query);

        return mysqli_affected_rows($connect);

        if (mysqli_query($connect, $query)) {
            return mysqli_affected_rows($connect);
        } else {
            echo "Error: " . mysqli_error($connect);
            return false; 
        }
    }
?>

