<?php
session_start();

// Database connection
$host = 'localhost';
$user = 'root';
$password = ''; // Update with your database password
$database = 'bulk-buy';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password === $confirm_password) {
        $email = $_SESSION['otp_email'];
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the password in the database
        $query = $conn->prepare("UPDATE user SET password = ? WHERE email = ?");
        $query->bind_param('ss', $hashed_password, $email);

        if ($query->execute()) {
            // Clear OTP session data
            unset($_SESSION['otp'], $_SESSION['otp_expiry'], $_SESSION['otp_email']);

            echo "<script>alert('Password reset successful.'); window.location.href = 'login.php';</script>";
        } else {
            echo "<script>alert('Failed to reset password. Please try again.'); window.location.href = 'reset_password.php';</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match.'); window.location.href = 'reset_password.php';</script>";
    }
}
?>
