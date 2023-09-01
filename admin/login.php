<?php

session_start();

include('../server/connection.php');

if(isset($_SESSION['admin_logged_in'])){
    header('location: index.php');
    exit;
}

if(isset($_POST['login_btn'])){

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $stmt = $conn->prepare("SELECT admin_id,admin_name, admin_email, admin_password FROM admins WHERE admin_email = ? AND admin_password = ?  LIMIT 1" );

  $stmt->bind_param('ss',$email,$password);

  if($stmt->execute()){
      $stmt->bind_result($admin_id,$admin_name,$admin_email,$admin_password);
      $stmt->store_result();

      if($stmt->num_rows() == 1){
        $stmt->fetch();

        $_SESSION['admin_id'] = $admin_id;
        $_SESSION['admin_name'] = $admin_name;
        $_SESSION['admin_email'] = $admin_email;
        $_SESSION['admin_logged_in'] = true;

        header('location: index.php?login_success=logged in successfully');

      }else{
        header('location: login.php?error=could not verify your account');
      }
 
  }else{
      //error
      header('location: login.php?error=something went wrong');
  }

}
else{

}


?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

  <h2 class="text-center mt-5">Login</h2>
  <div class="table-responsive">

  <div class="mx-auto container">
    <form action="login.php" method="POST" enctype="multipart/form-data" id="login-form">
        <p style="color: red;"><?php if(isset($_GET['error'])) { echo $_GET['error']; } ?></p>
        <div class="form-group mt-2">
            <label>Email</label>
            <input type="email" name="email" id="product-name" class="form-control" placeholder="Enter Email Address">
        </div>

        <div class="form-group mt-2">
            <label>Password</label>
            <input type="password" name="password" id="product-desc" class="form-control" placeholder="Enter Password">
        </div>

        <div class="form-group mt-3">
            <input type="submit" name="login_btn" class="btn btn-primary" value="Login">
        </div>

    </form>
  </div>
  
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>