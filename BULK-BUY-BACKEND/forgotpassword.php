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
    $action = $_POST['action'];

    if ($action == 'request_otp') {
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

            echo json_encode(['status' => 'success', 'message' => 'OTP sent to your email.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Email is not registered.']);
        }
    } elseif ($action == 'verify_otp') {
        $input_otp = $_POST['otp'];

        if (isset($_SESSION['otp']) && isset($_SESSION['otp_expiry']) && time() < $_SESSION['otp_expiry']) {
            if ($input_otp == $_SESSION['otp']) {
                // OTP is valid
                echo json_encode(['status' => 'success', 'message' => 'OTP verified.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid OTP.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'OTP expired.']);
        }
    } elseif ($action == 'reset_password') {
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

                echo json_encode(['status' => 'success', 'message' => 'Password reset successful.', 'redirect' => 'login.php']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to reset password.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Passwords do not match.']);
        }
    }
}
?>
