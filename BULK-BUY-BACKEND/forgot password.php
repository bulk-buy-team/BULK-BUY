<?php
// request_otp.php
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
    $email = $_POST['email'];

    // Check if email exists in the database
    $query = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $query->bind_param('s', $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        // Generate OTP
        $otp = rand(100000, 999999);
        $expiry_time = time() + (5 * 60); // 5 minutes from now

        // Store OTP and expiry time in session
        $_SESSION['otp'] = $otp;
        $_SESSION['otp_expiry'] = $expiry_time;
        $_SESSION['otp_email'] = $email;

        // Send OTP to the user's email (ensure you configure mail properly)
        mail($email, 'Your OTP Code', "Your OTP is: $otp\nIt will expire in 5 minutes.");

        header("Location: verify_otp.php"); // Redirect to OTP verification page
    } else {
        echo "<script>alert('Email is not registered.'); window.location.href = 'forgot_password.php';</script>";
    }
}
?>
