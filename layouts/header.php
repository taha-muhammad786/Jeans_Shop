
<?php 

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
    /* Add custom styles for hover dropdown */
    .dropdown:hover .dropdown-menu {
        display: block;
    }

  .button-container {
    display: flex;
    flex-direction: row;
    gap: 10px; /* Spacing between buttons */
    margin-top: -5%;
  }
  </style>


</head>
<body>
    
<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top py-3">
    <div class="container">
        <!-- <img src="assets/images/logo.png" /> -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-button" id="navbarSupportedContent">
        <ul style="margin-left: -20%;" class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>

          <li class="nav-item button-container">
                    <!-- <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                    <a href="account.php"><i class="fas fa-user"></i></a> -->
                   <a href="cart.php"><button style="margin-top: 20%;" class="buy-btn">My Cart</button></a> 
                   <a href="login.php"><button style="margin-top: 16%;" class="buy-btn">My Account</button></a> 
                    
                </li>

        </ul>
          
      </div>
    </div>
  </nav>

