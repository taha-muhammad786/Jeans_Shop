<?php include('layouts/header.php'); ?>


<?php


include('server/connection.php');


if(!isset($_SESSION['logged_in'])){
  header('location: login.php');
  exit;

}

if(isset($_GET['logout'])){
  if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    header('location: login.php');
    exit;
  }
}


if(isset($_POST['change_password'])){
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $user_email = $_SESSION['user_email'];

            //If password dont match
            if($password !== $confirmPassword){
              header('location: accout.php?error=Passwords dont match');
          
              //If password is less than 6 char 
            }else if(strlen($password) < 6){
              header('location: accout.php?error=Password must be at least 6 charachters');

              //no error 
            }else{
              $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");             
              $stmt->bind_param('ss',md5($password),$user_email);

              if($stmt->execute()){
                header('location: accout.php?message=password has been updated successfully');
              }else{
                header('location: accout.php?error=could not update password');
              }

            }
  
      

}



//get orders
if(isset($_SESSION['logged_in'])){

  $user_id = $_SESSION['user_id'];

  $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=? ");

  $stmt->bind_param('i',$user_id);

  $stmt->execute();

  $orders = $stmt->get_result(); // []  


}


?>







<!-- Account -->
<section class="my-5 py-5">
    <div class="row container mx-auto">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">

        <p class="text-center" style="color: green;"><?php if(isset($_GET['register_success'])){ echo $_GET['register_success'];} ?></p>
        <p class="text-center" style="color: green;"><?php if(isset($_GET['login_success'])){ echo $_GET['login_success'];} ?></p>

            <h3 class="font-weight-bold">Account info</h3>
            <hr class="mx-auto">
            <div class="account-info">
                <p>Name <span><?php if(isset($_SESSION['user_name'])){  echo $_SESSION['user_name'];} ?></span></p>
                <p>Email <span><?php if(isset($_SESSION['user_email'])){  echo $_SESSION['user_email'];} ?></span></p>
                <p><a href="#orders" id="orders-btn">Your Order</a></p>
                <p><a href="accout.php?logout=1" id="logout-btn">Logout</a></p>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12">
            <form id="account-form" method="POST" action="accout.php">
              <p class="text-center" style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
              <p class="text-center" style="color: green;"><?php if(isset($_GET['message'])){ echo $_GET['message'];} ?></p>
                <h3>Change Password</h3>
                <hr class="mx-auto">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" id="account-password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirmPassword" class="form-control" id="account-password-confirm" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="change_password" value="Change Password" class="btn" id="change-pass-btn">
                </div>
            </form>
        </div>

    </div>
</section>



<!-- Order -->

<section id="orders" class="orders container my-5 py-3">
  <div class="container mt-2">
    <h2 class="font-weight-bold text-center">Your Orders</h2>
    <hr class="mx-auto">
  </div>

  <table class="mt-5 pt-5">
    <tr>
      <th>Order id</th>
      <th>Order Cost</th>
      <th>Order Status</th>
      <th>Order Date</th>
      <th>Order Details</th>
    </tr>


    <?php while($row = $orders->fetch_assoc() ) { ?>

     <tr>
      <td>
        <!-- <div class="product_info">
          <img src="assets/images/10.jpg" alt="">
          <div>
            <p class="mt-3"><?php echo $row['order_id']; ?></p>
          </div>
        </div> -->

        <span><?php echo $row['order_id']; ?></span>


      </td>

      <td>
        <span><?php echo $row['order_cost']; ?></span>
      </td>

      <td>
        <span><?php echo $row['order_status']; ?></span>
      </td>

      <td>
        <span><?php echo $row['order_date']; ?></span>
      </td>

      <td>
        <form method="POST" action="order_details.php">
          <input type="hidden" name="order_status" value="<?php echo $row['order_status']; ?>">
          <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?> " />
          <input type="submit" class="btn order-details-btn" name="order_details_btn" value="Details ">
        </form>
      </td>


    </tr>

    <?php } ?>

  </table>



</section>



<?php include('layouts/footer.php'); ?>