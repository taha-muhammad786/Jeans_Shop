<?php include('layouts/header.php'); ?>


<?php



if( !empty($_SESSION['cart']))
{
 
  //let User in 


  //send user to home page 
}else{
  header('location: index.php');
}




?>



<!-- Checkout -->

<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Check Out </h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="checkout-form" method="POST" action="server/place_order.php">

        <p class="text-center" style="color: red;">

        <?php if(isset($_GET['message'])){ echo $_GET['message']; } ?> 
        
        <?php if(isset($_GET['message'])){?>

          <a href="login.php" class="btn btn-primary">Login</a>

         <?php } ?>


      </p>

            <div class="form-group checkout-small-element">
                <label>Name</label>
                <input type="text" class="form-control" name="name" id="checkout-name" placeholder="Enter Name " required>
           </div>
            <div class="form-group checkout-small-element">
                 <label>Email</label>
                 <input type="email" class="form-control" name="email" id="checkout-email" placeholder="Enter Email " required>
            </div>
            <div class="form-group checkout-small-element">
                <label>Phone</label>
                <input type="tel" class="form-control" name="phone" id="checkout-phone" placeholder="Enter Phone Number " required>
           </div>
           <div class="form-group checkout-small-element">
            <label>City</label>
            <input type="text" class="form-control" name="city" id="checkout-city" placeholder="Enter City " required>
       </div>
       <div class="form-group checkout-large-element">
        <label>Address</label>
        <input type="text" class="form-control" name="address" id="checkout-address" placeholder="Enter Address " required>
   </div>
           <div class="form-group checkout-btn-container">
            <p>Total Ammount : <?php echo $_SESSION['total']; ?> </p>
            <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order">
       </div>

        </form>
    </div>
  </section>









  <?php include('layouts/footer.php'); ?>