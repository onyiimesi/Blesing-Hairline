<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "admin/functions.php"; ?>

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
                                <a href="/hairline/"><img src="img/logo/logo1.png" alt=""> BLESSING HAIRLINE COMPANY</a>
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

    <!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Search Page</h4>
			<div class="site-pagination">
			</div>
		</div>
	</div>
    <!-- Page info end -->

    <!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 product-details">
                    
                    <?php 
                    
                    
                    if (isset($_POST['submit'])) {
                            
                        $search = $_POST['search'];

                        $query = "SELECT posts.post_id, posts.post_category_id, posts.post_title, posts.post_price, posts.post_image, posts.post_content, posts.post_code, brands.brand_id, brands.brand_title FROM posts LEFT JOIN brands ON posts.post_category_id = brands.brand_id WHERE post_tag LIKE '%$search%' ";

                        $search_query = mysqli_query($connection, $query);

                        if (!$search_query) {
                            
                            die("QUERY FAILED" .mysqli_error($connection));

                        }

                        $count = mysqli_num_rows($search_query);

                        if ($count == 0) {
                            
                            echo "";

                        } else{

                            while($row = mysqli_fetch_assoc($search_query)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_price = $row['post_price'];
                                $post_image = $row['post_image'];
                                $post_code = $row['post_code'];
                                $post_content = $row['post_content'];
                                $brand_title = $row['brand_title'];
                                $brand_id = $row['brand_id'];
                                
                                ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="product-pic mb-100">
                                                <img src="/hairline/img/posts/<?php echo imagePlaceholder($post_image); ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="p-stocks"><?php echo $brand_title; ?></h4><hr>
                                            <h2 class="p-title"><?php echo $post_title; ?></h2>
                                            <h3 class="p-price"><?php echo $post_price; ?></h3>
                                            <h4 class="p-stock">Available: <span>In Stock</span></h4>
                                            <div class="quantity">
                                                <!--<p>Quantity</p>
                                                <div class="pro-qty"><input type="text" value="1"></div>-->
                                            </div>
                                            <form action="" class="form-submit">
                                                <input type="hidden" class="pid" value="<?php echo $row['post_id']; ?>">
                                                <input type="hidden" class="ptitle" value="<?php echo $row['post_title']; ?>">
                                                <input type="hidden" class="pprice" value="<?php echo $row['post_price']; ?>">
                                                <input type="hidden" class="pimage" value="<?php echo $row['post_image']; ?>">
                                                <input type="hidden" class="pcode" value="<?php echo $row['post_code']; ?>">

                                                <button class="btn addItemBtn site-btn">Add to Cart</button> 
                                            </form>
                                            <!--<a href="/hairline/carts/<?php //echo $post_id; ?>" class="site-btn">Add to Cart</a>-->
                                            <div id="accordion" class="accordion-area">
                                                <div class="panel">
                                                    <div class="panel-header" id="headingOne">
                                                        <button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button>
                                                    </div>
                                                    <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                        <div class="panel-body">
                                                            <p><?php echo $post_content; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel">
                                                    <div class="panel-header" id="headingTwo">
                                                        <button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">how to order </button>
                                                    </div>
                                                    <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                        <div class="panel-body">
                                                            <ol class="ml-4">
                                                                <li>Click the Add To Cart Button above.</li>
                                                                <li>Then go to your Cart page.</li>
                                                                <li>Make sure you created an account and you are logged in. This will allow you access your Checkout page.</li>
                                                                <li>Fill in the form in the Checkout page to place your order.</li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel mbs-100">
                                                    <div class="panel-header" id="headingThree">
                                                        <button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">payment details</button>
                                                    </div>
                                                    <div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                        <div class="panel-body">
                                                            <h5 style="color: red;">Bank Transfer</h5>
                                                            <h6>Send Details as:</h6>
                                                            <p>Depositor's name, Slip number, Date of Payment and Email to blessinghairline@gmail.com or Send the details to our contact page.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
      
                          <?php   } 
                          }
                    }
                      ?>
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->

    <section class="slots-list spad">
      <div class="container">
          <div class="other">
              <h3>CONTINUE SHOPPING</h3>
          </div><hr>
          
        <div class="row">
            <?php 
                        
                $query = "SELECT posts.post_id, posts.post_category_id, posts.post_title, posts.post_price, posts.post_image, posts.post_content, ";
                $query .= "brands.brand_id, brands.brand_title ";
                $query .= "FROM posts ";
                $query .= "LEFT JOIN brands ON posts.post_category_id = brands.brand_id WHERE post_status = 'published' LIMIT 4";
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
      </div>
    </section>
    
    <?php include "includes/footer.php"; ?>