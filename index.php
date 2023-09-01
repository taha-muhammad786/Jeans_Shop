<?php 

include('layouts/header.php');

// include('layouts/preloder.php');

?>



<!-- Home -->

<section id="home">
    <div class="container"> 
        <h5>NEW ARRIVALS</h5>
        <h1><span>Best Price</span> This Season</h1>
        <p>Eshop Offer The best produts for the most affordable prices</p>
        <a href="shop.php">
        <button>Shop Now</button>
        </a>
    </div>
</section>


<!-- Brand -->

<section id="brand" class="container">
    <div class="row">
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/2.jpg" alt="">
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/3.jpg" alt="">
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/4.jpg" alt="">
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/5.jpg" alt="">
    </div>
</section>

 
<!-- NEW -->

<section id="new" class="w-100">
    <div class="row p-0 m-0">
        <!-- one -->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img src="assets/images/6.jpg" class="img-fluid" alt="">
            <div class="details">
                <h2>Extreamely Awesome Jeans</h2>
                <button class="text-uppercase">Shop Now</button>
            </div>
        </div>
        <!-- Two -->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img src="assets/images/7.jpg" class="img-fluid" alt="">
            <div class="details">
                <h2>Extreamely Awesome Cotton Jeans</h2>
                <button class="text-uppercase">Shop Now</button>
            </div>
        </div>
        <!-- Three -->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img src="assets/images/9.jpg" class="img-fluid" alt="">
            <div class="details">
                <h2>Extreamely Awesome Chinno Jeans</h2>
                <button class="text-uppercase">Shop Now</button>
            </div>
        </div>
    </div>
</section>



<!-- Featured -->

<section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3>Our Featured</h3>
        <hr>
        <p>Here you can check out our featured produts</p>
    </div>
    <div class="row mx-auto container-fluid">
         
        <?php include('server/get_featured_products.php'); ?>

        <?php while($row= $featured_products->fetch_assoc()){  ?>

        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/<?php echo $row['product_image']; ?> " alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
            <a href="<?php echo"single_product.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a> 
        </div>

        <?php } ?>

        <section id="banner" class="my-5 py-5">
    <div class="container">
        <h4>MID SEASON'S SALE</h4>
        <h1>Autumn Collection <br> UP to 30% OFF</h1>
        <button class="text-uppercase">Shop Now</button>
    </div>
</section>

    </div>
</section>

<!-- Banner -->










<?php include('layouts/footer.php'); ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>