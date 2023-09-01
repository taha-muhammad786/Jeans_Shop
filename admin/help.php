<?php include('header.php'); ?>


<?php

    if(!isset($_SESSION['admin_logged_in'])){
        header('location: login.php');
        exit;
    }

?>









<div class="container-fluid">
    <div class="row" style="min-height:1000px">


<?php include('sidemenu.php'); ?>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-froup me-2">
                
            </div>
        </div>
    </div>
<h1>Help</h1>

<h5>Please Contact : <a href="tel:03162418947">03162418947</a></h5>

<h5>Email : <a style="color: #fb774b; text-decoration: none;" href="mailto: tsyed6804@gmail.com">tsyed6804@gmail.com</a></h5>



</div>

</main>
</div>
</div>