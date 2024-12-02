<?php 
session_start();
if (isset($_SESSION["user12"])) {
  $user =  $_SESSION['user12'];
  $lastname = $user['lastname'];
  $firstname = $user['firstname'];
  $fullname = $firstname .' '. $lastname;
  $email = $user['email'];
  }
  elseif (isset($_SESSION["user13"])) {
    $user =  $_SESSION['user13'];
    $lastname = $user['lastname'];
    $firstname = $user['firstname'];
    $fullname = $firstname .' '. $lastname;
    $email = $user['email'];
    }
  else{
     header("location:./login.html");
  }
  
// Database connection
$servername = "localhost"; // or your server
$username = "root";        // your database username
$password = "";            // your database password
$dbname = "bulk-buy"; // your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    $querry = "SELECT * FROM successful_transaction WHERE email = '$email' AND fullname = '$fullname'";
    $stnt1 = mysqli_query($conn,$querry);
    $transaction = $stnt1->fetch_all(MYSQLI_ASSOC);

 

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/styles/faq.css">
  <title>Profile</title>
</head>
<body>
  <div class="sidebar">
    <div class="logo">
      <img src="assets/images/logo.PNG" alt="">
    </div>
    <nav>
      <ul>
      <li>
            <?php
            
              if (isset($_SESSION["user12"])) {
                echo "<li><a href='dashboard.php'>Home</a></li>";
              }
              elseif (isset($_SESSION["user13"])) {
                echo "<li><a href='admin.php'>Home</a></li>";
              }
            ?>
          </li>
        <li><a href="product.php">Products</a></li>
        <li><a href="./faq.php">FAQ</a></li>
        <li><a href="history.php">Order History</a></li>
        <li><a href="profile.php">Profile</a></li>
        
        <li><a href="../BULK-BUY-BACKEND/logout.php">Logout</a></li>
        <!-- <li><a href="#">Support</a></li> -->
        <!-- <li><a href="#">Settings</a></li> -->
        <!-- <li><a href="#">Logout</a></li> -->
      </ul>
    </nav>
        <!-- <li><a href="#">Settings</a></li> -->
  </div>
  <div class="mobile-navbar">
    <nav>
      <ul>
        <a href="dashboard.html"><li class="Home"><img src="assets/images/home.png" alt=""></li></a>
        <a href="product.html"><li class="cart"><img src="assets/images/shopping-cart.png" alt=""></li></a>
        <a href="history.html"><li class="history"><img src="assets/images/calendar.png" alt=""></li></a>
        <a href="profile.html"><li class="settings"><img src="assets/images/profile.png" alt=""></li></a>
      </ul>
    </nav>
  </div>
  <main>
    <header>
      <div class="home">
        <a href="#">FAQs</a>
        <a href="#"><img src="assets/images/bell.png" alt="notification"></a>
      </div>
      <div class="search-bar">
        <div class="search-icon">
            <img src="assets/images/search1.png" alt="">
        </div>
        <input type="search" name="search" id="search" placeholder="Search">
      </div>
    </header>
    <div class="main-container">
      <div class="faq-container">
        <div class="title">
          <h2>what is bulk buy?</h2>
        </div>
        <div class="footer">
          <h3>
            Bulk buy is a site where you
            can buy products at bulk by
            joining a team and paying for the specific units you want
          </h3>
        </div>
      </div>
      <div class="faq-container">
        <div class="title">
          <h2>How to make payment?</h2>
        </div>
        <div class="footer">
          <h3>
            making payment is easy, just
            select the number of units you
            want and click add me and you
            will be redirected to one of
            our payment partners where you
            can pay with your debit card
            or transfer
          </h3>
        </div>
      </div>
      <div class="faq-container">
        <div class="title">
          <h2>when and where do i recieve the product?</h2>
        </div>
        <div class="footer">
          <h3>
            you will recieved the product
            at our established pickup
            stations 1 week after all
            avaliable units of the product
            are sold out
          </h3>
        </div>
      </div>
    </div>
  </main>
</body>
</html>