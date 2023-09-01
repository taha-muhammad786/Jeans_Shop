<?php 

include('header.php');

?>

<?php

if(isset($_GET['product_id'])){

    $product_id = $_GET['product_id'];
    $product_name = $_GET['product_name'];

}else{
    header('location: products.php');
}


?>





<div class="container-fluid">
    <div class="row" style="min-height: 1000px">

    <?php include('sidemenu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-froup me-2">
                        
                    </div>
                    </div>
                </div>


    <h2>Update Product Images</h2>
    <div class="table-responsive">

        <div class="mx-auto container">
            <form id="edit-order-form" method="POST" enctype="multipart/form-data" action="update_images.php">

                <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }  ?></p>

                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
                <input type="hidden" name="product_name" value="<?php echo $product_name; ?>" />

                <div class="form-group mt-3">
                    <label>Image 1</label>
                    <input type="file" name="image1" id="image1" class="form-control" placeholder="First Image" required>
                </div>

                <div class="form-group mt-3">
                    <label>Image 2</label>
                    <input type="file" name="image2" id="image2" class="form-control" placeholder="Second Image" required>
                </div>

                <div class="form-group mt-3">
                    <label>Image 3</label>
                    <input type="file" name="image3" id="image3" class="form-control" placeholder="Third Image" required>
                </div>

                <div class="form-group mt-3">
                    <label>Image 4</label>
                    <input type="file" name="image4" id="image4" class="form-control" placeholder="Forth Image" required>
                </div>


                <div class="form-group my-3">
                    <input type="submit" class="btn btn-primary" name="update_images" value="Update">
                </div>


            </form>
        </div>
    </div>
            </main>
    </div>
</div>