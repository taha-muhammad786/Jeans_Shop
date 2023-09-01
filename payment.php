
<?php include('layouts/header.php'); ?>



<?php


if(isset($_POST['order_pay_btn'])){
    $order_status = $_POST['order_status'];
    $order_total_price = $_POST['order_total_price'];
}



?>



<!-- Payment -->

<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Payment </h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container text-center">

    <?php if(isset($_SESSION['total']) && $_SESSION['total'] != 0 ) {?>
        <p>Total Payment: PKR <?php echo $_SESSION['total']; ?></p>
        <a href="thank.php"> <input class="btn btn-primary"  type="submit" value="Cash on delivery">
        </a>
        
        <?php } else if(isset($_POST['order_status']) && $_POST['order_status'] == "not paid" ){ ?>
            <p>Total Payment: PKR <?php echo $_POST['order_total_price']; ?></p>
            <input class="btn btn-primary" type="submit" value="Pay Now">

        <?php } else {  ?>
            <p>You don't have an order</p>
         <?php } ?>   
         
    </div>
  </section>









  <?php include('layouts/footer.php'); ?>