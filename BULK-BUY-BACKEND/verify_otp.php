<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input_otp = $_POST['otp'];

    if (isset($_SESSION['otp']) && isset($_SESSION['otp_expiry']) && time() < $_SESSION['otp_expiry']) {
        if ($input_otp == $_SESSION['otp']) {
            header("Location: reset_password.php"); // Redirect to reset password page
        } else {
            echo "<script>alert('Invalid OTP.'); window.location.href = 'verify_otp.php';</script>";
        }
    } else {
        echo "<script>alert('OTP expired. Please request a new OTP.'); window.location.href = 'forgot_password.php';</script>";
    }
}
?>
