<?php
include('config.php');


// Ensure to validate all user inputs before using them in queries
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $gmail = htmlspecialchars($_POST['gmail']);
    $phone = htmlspecialchars($_POST['phone']);
    $buffets_id = (int)$_POST['buffets_id']; // Sanitize room_id
    $check_in = $_POST['check_in'];

    try {
        // Add customer data
        $stmt = $pdo->prepare("INSERT INTO customers (name, email, phone) VALUES (?, ?, ?)");
        if (!$stmt) {
            echo "Failed to prepare the statement for customer data.";
        } else {
            $stmt->execute([$name, $gmail, $phone]);
            $customer_id = $pdo->lastInsertId();
        }

        // Add reservation data
        $stmt = $pdo->prepare("INSERT INTO reservations (buffets_id, customer_id, check_in) VALUES (?, ?, ?)");
        if (!$stmt) {
            echo "Failed to prepare the statement for reservation data.";
        } else {
            $stmt->execute([$buffets_id, $customer_id, $check_in]);
            $reservation_id = $pdo->lastInsertId();
        }

        // Redirect to review form with reservation ID
        header("Location: review_form.php?reservation_id=" . $reservation_id);
        exit();
    } catch (Exception $e) {
        echo "<div class='alert alert-danger' role='alert'>Failed to make reservation: " . $e->getMessage() . "</div>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="reservasi.css">
    <link rel="icon" href="/assets/image/logweb.png">
    <script src="script.js"></script>
    <title>Dine It</title>
</head>
<body>
        <nav>
            <ul class="sidebar">
                <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#e8eaed"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
                <li><a href="#">Service</a></li>
                <li><a href="#">Reservation</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
            <ul>
                <li class="logo"><a href="index.php">DineIt</a></li>
                <li class="hideOnMobile"><a href="order.htm">Reservation</a></li>
                <li class="hideOnMobile"><a href="shippment.html">Service</a></li>
                <li class="hideOnMobile"><a href="#">Contact</a></li>
                <li class="hideOnMobile"><a href="#">About us</a></li>
                <li class="hideOnMobile"><a href="login.php">Login</a></li>
                <li onclick=showSidebar()><a href=""><svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#e8eaed"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
            </ul>
        </nav>

        <main>

<div class="container">
    <div class="reservation-form">
        <h1>Reservasi Meja "DineIT"</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan Nama" required>
            </div>
            <div class="mb-3">
                <label for="gmail" class="form-label">Email</label>
                <input type="gmail" id="gmail" name="gmail" class="form-control" placeholder="Masukkan Gmail" required>
            </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Masukkan Nomor Telepon" required>
                </div>
                <div class="mb-3">
                    <label for="buffets_id" class="form-label">Pilih Meja</label>
                    <select id="buffets_id" name="buffets_id" class="form-select" required>
                        <?php
                        $stmt = $pdo->query("SELECT * FROM buffets WHERE availability = 1");
                        while ($row = $stmt->fetch()) {
                            echo "<option value='{$row['id']}'>buffets {$row['buffets_number']} ({$row['type']} - Rp{$row['price']})</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="check_in" class="form-label">Tanggal Check-in</label>
                    <input type="date" id="check_in" name="check_in" class="form-control" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-custom btn-lg">Reservasi Sekarang</button>
                </div>
            </form>
        </div>
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
