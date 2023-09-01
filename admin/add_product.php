<?php

include('header.php'); 

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


    <h2>Create Product</h2>
    <div class="table-responsive">
        <div class="mx-auto container">
            <form id="create-form" enctype="multipart/form-data" method="POST" action="create_product.php">
                <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }  ?></p>
                <div class="form-group mt-2">
                    
                    <label>Title</label>
                    <input type="text" name="name" id="product-name" class="form-control" placeholder="Title" required>
                </div>

                <div class="form-group mt-2">
                    <label>Description</label>
                    <input type="text" name="description" id="product-desc" class="form-control"  placeholder="Description" required>
                </div>

                <div class="form-group mt-2">
                    <label>Price</label>
                    <input type="text" name="price" id="product-price" class="form-control" placeholder="Price" required>
                </div>

                <div class="form-group mt-2">
                    <label>Special Offer/Sale</label>
                    <input type="number" name="offer" id="product-offer" class="form-control"  placeholder="Sale %" required>
                </div>

                <div class="form-group mt-2">
                    <label>Category</label>
                    <select name="category" required class="form-select">
                        <option value="jeans">Jeans</option>
                        <option value="simple jeans">Simple Jeans</option>
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label>Color</label>
                    <input type="text" name="color" id="product-color" class="form-control"  placeholder="Enter Color" required>
                </div>

                <div class="form-group mt-2">
                    <label>Image 1</label>
                    <input type="file" name="image1" id="image1" class="form-control"  placeholder="First Image" required>
                </div>

                <div class="form-group mt-2">
                    <label>Image 2</label>
                    <input type="file" name="image2" id="image2" class="form-control"  placeholder="Second Image" required>
                </div>

                <div class="form-group mt-2">
                    <label>Image 3</label>
                    <input type="file" name="image3" id="image3" class="form-control"  placeholder="Third Image" required>
                </div>

                <div class="form-group mt-2">
                    <label>Image 4</label>
                    <input type="file" name="image4" id="image4" class="form-control"  placeholder="Fourth Image" required>
                </div>



                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary" name="create_product" value="Create">
                </div>


            </form>
        </div>
    </div>


            </main>
    </div>
</div>