<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "admin/functions.php"; ?>

<?php  

    if (!isuserLoggedIn()) {
        redirect("/cart/");
    }

?>

<?php  

$grand_total = 0;
$allItems = '';
$items = array();

$sql = "SELECT CONCAT(post_title, '(',post_quantity,')') AS ItemQty, total_price FROM cart";
$stmt = $connection->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()){
    $grand_total +=$row['total_price'];
    $items[] = $row['ItemQty'];
}
$allItems = implode(", ", $items);



?>


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
			<h4>Your Cart</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Cart</a> 
			</div>
		</div>
	</div>
    <!-- Page info end -->
    
    <!-- checkout section  -->
    <section class="checkout-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-2 order-lg-1" id="order">
                    
                    <div class="jumbotron p-3 mb-2 text-center">
                        <h6><b>Product(s) : </b><?php echo $allItems; ?></h6>
                        <h5><b>Total Amount To Be Paid : </b>&#8358;<?php echo number_format($grand_total,0); ?></h5>
                    </div>
                    <form action="" method="post" class="checkout-form" id="placeOrder">
                        <input type="hidden" name="products" value="<?php echo $allItems; ?>">
                        <input type="hidden" name="grand_total" value="<?php echo $grand_total; ?>">
                        <div class="cf-title">Billing Address</div>
                        <div class="row">
                            <div class="col-md-7">
                                <p>*Billing Information</p>
                            </div>
                        </div>
                        <div class="row address-inputs">
                            <div class="col-md-12">
                                <input type="text" name="name" placeholder="Full name" required="">
                                <input type="text" name="email" placeholder="Email" required="">
                                <input type="text" name="phone" placeholder="Phone no." required="">
                                <input type="text" name="address" placeholder="Address" required="">                                
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="country" placeholder="Country" required="">  
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="zip" placeholder="Zip code" required="">
                            </div>
                        </div>
                        <div class="cf-title">Payment</div>
                        <div class="form-group" style="width: 250px;">
                            <select name="pmode" id="" class="form-control" required="">
                                <option value="" selected disabled>Select Payment Type</option>
                                <option value="cash on delivery">Cash On Delivery</option>
                                <option value="bank transfer">Bank Transfer</option>
                            </select>
                        </div>
                        <input type="submit" name="submit" class="site-btn submit-order-btn" value="Place Order">
                    </form>
                </div>
                <div class="col-lg-4 order-1 order-lg-2 mb-3">
                    <div class="checkout-cart">
                        <h5 style="color: red;">NB: For Bank Transfer</h5>
                        <h6>Send Details as:</h6>
                        <p>Depositor's name, Slip number, Date of Payment and Email to blessinghairline@gmail.com or Send the details to our contact page.</p>
                        <h6 class="bg-info p-2 rounded text-light">Please note that your order will be processed 24 hours after payment has been confirmed.</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- checkout section end -->

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
                $query .= "LEFT JOIN brands ON posts.post_category_id = brands.brand_id WHERE post_status = 'published'  LIMIT 4";
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
                    <a href="buy/<?php echo $post_id; ?>"><img src="/hairline/img/posts/<?php echo imagePlaceholder($post_image); ?>" alt=""></a>
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