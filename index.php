<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "admin/functions.php"; ?>


<?php  
    $stmt = $connection->prepare("SELECT * FROM posts");
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows();

    if ($rows < 0) {
           redirect("countdown");
        }    
?>

    <!-- Page Preloder -->
	<div id="preloder">
        <div class="loader"></div>
    </div>

    <button id="scrollToTopButton" onclick="scrollToTop(300,3)" title="Scroll to Top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Header Section -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <?php include "includes/navss.php"; ?>
                </div>
            </div>
        </div>
        <div class="header-middle" id="card">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="header_border">
                            <div class="head">
                                <div class="row">
                                    <div class="col-md-6">
                                       <a href="/hairline/" id="logo"><img src="img/logo/logo1.png" alt=""> BLESSING HAIRLINE COMPANY</a> 
                                    </div>
                                    <div class="col-md-6">
                                        <a class="writes" href="#reviews"> <i class="fas fa-star"></i> <span class="writes">Write A Review</span></a>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
                <div class="row">
                    <nav class="navbar main-menu navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
                        <i style="color: #000;" class="fa fa-align-justify"></i>
                        </button>

                        <div class="collapse navbar-collapse"  id="navbarNav">
                            <?php include "includes/navs.php"; ?>
                        </div>
                    </nav>
                   
                </div>
            </div>
        </div>
    </header>
    <!-- End Of Header Section -->

    <!-- Banner Section -->
    <div class="banner">
        <div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="img/banner/b.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							<h2>Brazillian Hair</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et 
                                dolore magna aliqua.</p>
                                
							<a href="#" class="site-btn sb-line">DISCOVER</a>
							<a href="#" class="site-btn sb-white">ADD TO CART</a>
						</div>
					</div>
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="img/banner/b.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							<h2>Nigerian Hair</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et 
                                dolore magna aliqua.</p>
							<a href="#" class="site-btn sb-line">DISCOVER</a>
							<a href="#" class="site-btn sb-white">ADD TO CART</a>
						</div>
					</div>
				</div>
			</div>
        </div>
        <div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
    </div>
    <!-- End Of Banner Section -->

    <!-- Details Section -->
    <div class="details">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature">
                        <div class="feature_icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h2>Fast Payment</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <div class="feature_icon">
                            <i class="fas fa-star-of-david"></i>
                        </div>
                        <h2>Premium Products</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <div class="feature_icon">
                            <i class="fas fa-plane-departure"></i>
                        </div>
                        <h2>Fast Delivery</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Of Details Section -->


    <!-- Products Section -->
    <section class="products">
        <div class="container">
            <div class="section-title">
                <h2>LATEST PRODUCTS</h2>        
                <div class="product-slider owl-carousel">
                    
                    <?php 
                        
                        $query = "SELECT posts.post_id, posts.post_category_id, posts.post_title, posts.post_price, posts.post_image, posts.post_length, posts.post_content, ";
                        $query .= "brands.brand_id, brands.brand_title ";
                        $query .= "FROM posts ";
                        $query .= "LEFT JOIN brands ON posts.post_category_id = brands.brand_id WHERE post_status = 'published' LIMIT 5";
                        $query_post_run = mysqli_query($connection,$query);

                        if (mysqli_num_rows($query_post_run) < 1) {

                            echo "<h3 class='text-center'>NO POST AVAILABLE</h3>";

                        } else{

                        while($row = mysqli_fetch_assoc($query_post_run)){
                            $post_id = $row['post_id'];
                            $post_category_id = $row['post_category_id'];
                            $post_title = $row['post_title'];
                            $post_price = number_format($row['post_price'],0);
                            $post_image = $row['post_image'];
                            $post_length = $row['post_length'];
                            $post_content = $row['post_content'];
                            $brand_title = $row['brand_title'];
                            $brand_id = $row['brand_id'];
                            
                            ?>
                    
                            <div class="product-item">
                                <div class="pi-pic">
                                    <a href="buy/<?php echo $post_id; ?>"><img src="img/posts/<?php echo imagePlaceholder($post_image); ?>" alt=""></a>
                                </div>
                                <div class="pi-text">
                                    <div class="cat">
                                        <span style="font-weight: 700;"><?php echo $post_title; ?> </span> -
                                        <span style="font-size: 12px;font-weight: 560;font-style: italic;"><?php echo $brand_title; ?></span>
                                    </div>
                                    <div class="length">
                                        <span style="font-weight: 700;font-size: 12px;">Length</span> - <span style="font-size: 12px;font-weight: 560;font-style: italic;"><?php echo $post_length; ?>"</span>
                                    </div>
                                     <div class="prices">
                                         <span style="font-weight: 700;">&#8358;<?php echo $post_price; ?></span>
                                     </div>
                                    <a href="buy/<?php echo $post_id; ?>"><button class="btn mb-5 p_btn"><i class="fas fa-money-bill-wave"></i> Buy</button></a>
                                </div>
                            </div>
                            
                      <?php  } } ?>
                    
                    
                    
<!--
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/product/22.jpg" alt="">
                        </div>
                        <div class="pi-text">
                            <h6>N35,00</h6>
                            <p>Classic Woman Frontal Wig </p>
                            <a href="buy.php"><button class="btn mb-5 p_btn"><i class="fas fa-money-bill-wave"></i> Buy</button></a>
                        </div>
                    </div>
-->
                </div>
            </div>
        </div>
    </section>
    <!-- End Of Products Section -->

    <!-- Banner section -->
	<section class="banner-section">
		<div class="container">
			<div class="banners set-bg" data-setbg="img/banner-bg.jpg">
				<div class="tag-new">NEW</div>
				<span>New Arrivals</span>
				<h2>Blessing Hairline</h2>
				<a href="/hairline/booking" class="site-btn">SHOP NOW</a>
			</div>
		</div>
	</section>
    <!-- Banner section end  -->
    
    <!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>BROWSE TOP SELLING BRANDS</h2>
			</div><hr>
			<ul class="product-filter-menu">  
                <?php 
                $query = "SELECT * FROM brands";
                $select_all_brands = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($select_all_brands)){
                    $brand_id = $row['brand_id'];
                    $brand_title = $row['brand_title'];
                    
                    echo "<li><a href='/hairline/category/$brand_id'>{$brand_title}</a></li>";
                }
                
                ?>
<!--
				<li><a href="#">Single Drawn</a></li>
				<li><a href="#">Double Drawn</a></li>
				<li><a href="#">Super Double Drawn</a></li>
				<li><a href="#">raw hair</a></li>
				<li><a href="#">virgin hair</a></li>
				<li><a href="#">COATS</a></li>
-->
			</ul><hr>
			<div class="row">
                
                <?php 
                        
                        $query = "SELECT posts.post_id, posts.post_category_id, posts.post_title, posts.post_price, posts.post_image, posts.post_content, ";
                        $query .= "brands.brand_id, brands.brand_title ";
                        $query .= "FROM posts ";
                        $query .= "LEFT JOIN brands ON posts.post_category_id = brands.brand_id WHERE post_status = 'published' LIMIT 8";
                        $query_post_run = mysqli_query($connection,$query);

                        if (mysqli_num_rows($query_post_run) < 1) {

                            echo "<h3>NO POST AVAILABLE</h3>";

                        }else{

                        while($row = mysqli_fetch_assoc($query_post_run)){
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_price = number_format($row['post_price'],0);
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $brand_title = $row['brand_title'];
                            $brand_id = $row['brand_id'];
                            
                            ?>
                
				<div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <a href="buy/<?php echo $post_id; ?>"><img src="img/posts/<?php echo imagePlaceholder($post_image); ?>" alt=""></a>
                        </div>
                        <div class="pi-text">
                            <div class="cat">
                                <span style="font-weight: 700;"><?php echo $post_title; ?> </span> -
                                <span style="font-size: 12px;font-weight: 560;font-style: italic;"><?php echo $brand_title; ?></span>
                            </div>
                             <div class="prices">
                                <span style="font-weight: 700;">&#8358;<?php echo $post_price; ?></span>
                             </div>
                            <a href="buy/<?php echo $post_id; ?>"><button class="btn mb-5 p_btns"><i class="fas fa-money-bill-wave"></i> Buy</button></a>
                        </div>
                    </div>
				</div>
                
                <?php  } } ?>
                
			</div>
			<div class="text-center pt-5">
                <a href="shop"><button class="site-btn sb-line sb-dark">LOAD MORE</button></a>
			</div>
		</div>
	</section>
    <!-- Product filter section end -->

    <!-- Video Tut -->
    <section class="video_tut">
        <div class="container">
            <div class="section-title">
                <h2>MESSAGE FROM HAIRLINE</h2>
			</div>
            <div class="row">
                <p><q>
                    Blessing Hairline is Nigeria\'s  leading  and most trusted Online Store for quality hairs. Blessing Hairline is a reputable  brand known both locally  and internationally  for 100% pure human hairs. We make it convenient for  ladies from all walks of life to have access to a wide selection of real human hairs products from the comfort of their homes or offices and make it even more convenient by delivering their hairs to their doorsteps within 24 hours in Nigeria and within 3 business days outside Nigeria
                </q></p>
            </div>
        </div>

        <div id="reviews"></div>
    </section>
    <!-- End Of Video Tut -->

    <!-- Review -->

    <section class="review">
        <div class="container">
            <div class="section-title">
                <h2>WRITE A REVIEW</h2>
                <p>What do you think about our products in general?. Why not write a short review to tell us 
                what you think.</p>
            </div>
            <div class="row">
                <div class="col-md-12" id="rev">
                    <div class="form">
                        <form action="" method="post" id="review">                    
                            <div class="form-group">
                                <input type="text"  name="review_name" id="exampleInputEmail1" placeholder="Full Name" required="">
                            </div>
                            <div class="form-group">
                                <textarea name="review_text" placeholder="Write a review" required=""></textarea>
                            </div>
                            <button type="submit" name="review" class="btns">Submit</button>                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End -->

    

    
    
   <?php include "includes/footer.php"; ?>


