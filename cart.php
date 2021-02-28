<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "carts.php"; ?>


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
    
    <!-- cart section end -->
    <section class="cart-section spad">
        <div class="container">
            <div class="row">               
                <div class="col-lg-9">
                        <div class="cart-table">
                            <div class='alert alert-danger alert-dismissible' style="display: <?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else{ echo 'none'; } unset($_SESSION['showAlert']); ?>;">
                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                <strong><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['showAlert']); ?></strong>
                            </div>
                            <h3>Your Cart</h3>
                            <div class="cart-table-warp  table-responsive">
                                
                                <table>
                                <thead>
                                    <tr>
                                        <th class="product-th">Product</th>
                                        <th class="total-th">Price</th>
                                        <th class="quy-th">Quantity</th>
                                        <th class="size-th">Length(")</th>
                                        <th class="total-th">Total Price</th>
                                        <th class="total-th"><a href="carts.php?clear=all" class="badge badge-danger p-2" onClick="return confirm('Are you sure?')">Clear Cart</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        $stmt = $connection->prepare("SELECT * FROM cart");
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        $grand_total = 0;
                                        while($row = $result->fetch_assoc()):
                                        ?>
                                            <tr>
                                                <td class='product-col'>
                                                    <img src="img/posts/<?php echo $row['post_image']; ?>" alt="">
                                                    <div class="pc-title">
                                                        <h4><?php echo $row['post_title']; ?></h4>
                                                    </div>
                                                </td>
                                                <input type="hidden" class="pid" value="<?php echo $row['post_id']; ?>">
                                                <td class="quy-col">
                                                   &#8358;<?php echo number_format($row['post_price'],0); ?>
                                                </td>
                                                <input type="hidden" class="pprice" value="<?php echo $row['post_price']; ?>">
                                                <td class="quy-col">
                                                    <input type="number" class="form-control itemQty" value="<?php echo $row['post_quantity']; ?>" style="width: 70px;">
                                                </td>
                                                <td class="size-col"><h4 ></h4></td>
                                                <td class="total-col">
                                                   &#8358;<?php echo number_format($row['total_price'],0); ?> 
                                                </td>
                                                <td>
                                                    <a href="carts/<?php echo $row['post_id']; ?>" class="text-danger" onClick="return confirm('Are you sure?')"><i class="fas fa-trash-alt lead"></i></a>
                                                </td>
                                                <td></td>                                   
            

                                                <!--<td class="total-col"><a class='btn btn-success' href="carts.php?add={$row['post_id']}"><span class='fas fa-plus'></span></a></td>
                                                <td class="total-col"><a class='btn btn-danger' href="carts.php?remove={$row['post_id']}"><span class='fas fa-times'></span></a></td>-->
                                            </tr>
                                            <?php $grand_total +=$row['total_price']; ?>
                                        <?php endwhile; ?>

                                    
                                    
                                </tbody>
                            </table>
                            <?php  

                                $stmt = $connection->prepare("SELECT * FROM cart");
                                $stmt->execute();
                                $stmt->store_result();
                                $rows = $stmt->num_rows();

                                if ($rows < 1) {
                                       echo "<h3 class='text-center text-danger'>Your Cart Is Empty!</h3>";
                                    }    

                            ?>
                            </div>
                            <div class="total-cost">
                                <h6>Total <span>&#8358;<?php echo number_format($grand_total,0); ?>
                                </span></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 card-right">
                        <form action="" method="post" class="promo-code-form">
                            <input type="text" placeholder="Enter promo code">
                            <button>Submit</button>
                        </form>
                        <a href="checkout" class="btn site-btn <?php echo ($grand_total > 1)?"":"disabled"; ?>">Checkout</a>    
                        <a href="/hairline/shop" class="site-btn sb-dark">Continue shopping</a>
                    </div>
            </div>
        </div>
    </section>
    <!-- cart section end -->

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
                $query .= "LEFT JOIN brands ON posts.post_category_id = brands.brand_id WHERE post_status = 'published' order by post_id DESC LIMIT 4";
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






    