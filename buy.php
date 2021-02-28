<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "admin/functions.php"; ?>


    <!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

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
                                <a href="/hairline/"><img src="/hairline/img/logo/logo1.png" alt=""> BLESSING HAIRLINE COMPANY</a>
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
			<h4>Buy Product PAge</h4>
			<div class="site-pagination">
				<a href="index.php">Home</a> /
                <a href="shop.php">Shop</a>
			</div>
		</div>
	</div>
    <!-- Page info end -->

    <!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="shop.php"> &lt;&lt; Back to Category</a>
			</div>
			<div class="row">
				<div class="col-lg-12 product-details">
                    
                    <?php 
                    
                    if(isset($_GET['p_id'])){
                        $post_id = $_GET['p_id'];
                    }
                        
                        $query = "SELECT posts.post_id, posts.post_category_id, posts.post_title, posts.post_price, posts.post_image, posts.post_content, posts.post_code, ";
                        $query .= "brands.brand_id, brands.brand_title ";
                        $query .= "FROM posts ";
                        $query .= "LEFT JOIN brands ON posts.post_category_id = brands.brand_id WHERE post_id = $post_id";
                        $query_post_run = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($query_post_run)){
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_price = number_format($row['post_price'],0);
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $post_code = $row['post_code'];
                            $brand_title = $row['brand_title'];
                            $brand_id = $row['brand_id'];
                            
                            ?>

                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-pic">
                                            <img src="/hairline/img/posts/<?php echo imagePlaceholder($post_image); ?>" alt="">
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div id="message"></div>
                                        <h4 class="p-stocks"><?php echo $brand_title; ?></h4><hr>
                                        <h2 class="p-title"><?php echo $post_title; ?></h2>
                                        <h3 class="p-price">&#8358;<?php echo $post_price; ?></h3>
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
                                        <!--<a href="/hairline/action/<?php //echo $post_id; ?>" ></a>-->
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
                                            <div class="panel">
                                                <div class="panel-header" id="headingTwo">
                                                    <button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Return Policy </button>
                                                </div>
                                                <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                    <div class="panel-body">
                                                        <p>
                                                            For Hygenic reasons, all hair bundles and wig sales are final sales. If there is a mistake on our end or a unit does not fit, wig must be returned within 3 days of receipt(3 business working days counting from the exact day you received your item). We deserve the right to refuse any unit sent back to us after those 5 days period.  
                                                        </p>
                                                        <p>
                                                            Once the bundle(s)is unwrapped, installed or tampered with from the original state of how it was dispatched, we deserve the the right to refuse such bundle(s) sent back to us.
                                                        </p>
                                                        <p>
                                                            Once the lace is cut, we will not make any changes to the wig. We will only accept wigs that have been unworn, unaltered and stored in it original packaging.
                                                        </p>
                                                        <h6>
                                                            Refund policy- We do not do a refund. All Hair sales is the final sale.
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel">
                                                <div class="panel-header" id="headingThree">
                                                    <button class="panel-link" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">payment details</button>
                                                </div>
                                                <div id="collapse4" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
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
  
                      <?php   } ?>
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->

    <!-- Review section -->
    <section class="rev_view spad">
        <div class="container">
            <div class="other">
              <h3>REVIEWS</h3>
            </div><hr>
            <div class="row">
                
            
            
            <?php 
                        
                $query = "SELECT * FROM review WHERE status = 'approved' LIMIT 5";
                $query_review_run = mysqli_query($connection,$query);

                if (mysqli_num_rows($query_review_run) < 1) {

                    echo "<h3>NO REVIEWS YET!</h3>";

                } else{

                while($row = mysqli_fetch_assoc($query_review_run)){
                    $review_id = escape($row['review_id']);
                    $review_name = escape($row['review_name']);
                    $review_text = escape($row['review_text']);
                    $review_date = escape($row['review_date']);

                    
                    ?>



                <div class="col-lg-12 col-sm-6">      
                    <h5>
                        <b><?php echo $review_name; ?></b>
                    </h5>
                
                
                    <p>
                        <?php echo $review_text; ?>
                    </p>
                
                
                    <h6>
                        <?php echo $review_date; ?>
                    </h6>                        
                    <hr>
                </div>
                
                <?php  } } ?>

            </div>
        </div>
    </section>
    <!-- Review section end -->
    
    <?php include "includes/footer.php"; ?>