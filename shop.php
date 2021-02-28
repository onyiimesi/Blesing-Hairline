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
			<h4>Shop's PAge</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Shop</a> 
			</div>
		</div>
	</div>
    <!-- Page info end -->
    
    <!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Brand(s)</h2>
						<ul class="category-menu">
                            
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
							<li><a href="#">Abercrombie & Fitch <span>(2)</span></a></li>
							<li><a href="#">Asos<span>(56)</span></a></li>
							<li><a href="#">Bershka<span>(36)</span></a></li>
							<li><a href="#">Missguided<span>(27)</span></a></li>
							<li><a href="#">Zara<span>(19)</span></a></li>
-->
						</ul>
                    </div>
                    
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
						
                        <?php 

                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else{
                            $page = "";
                        }

                        if ($page == "" || $page == 1) {
                            $page_1 = 0;
                        } else{
                            $page_1 = ($page * 9) - 9;
                        }


                        $post_query_count = "SELECT * FROM posts";
                        $find_count = mysqli_query($connection,$post_query_count);
                        $count = mysqli_num_rows($find_count);

                        if ($count < 1) {
                            echo "<h3 class='text-center'>NO POST AVAILABLE</h3 >";
                        } else{


                        $count = ceil($count / 9);

                        
                        $query = "SELECT posts.post_id, posts.post_category_id, posts.post_title, posts.post_price, posts.post_length, posts.post_image, posts.post_content, ";
                        $query .= "brands.brand_id, brands.brand_title ";
                        $query .= "FROM posts ";
                        $query .= "LEFT JOIN brands ON posts.post_category_id = brands.brand_id WHERE post_status = 'published' LIMIT $page_1, 9";
                        $query_post_run = mysqli_query($connection,$query);

                        if (mysqli_num_rows($query_post_run) < 1) {

                            echo "<h3 class='text-center'>NO POST AVAILABLE</h3>";

                        } else{

                        while($row = mysqli_fetch_assoc($query_post_run)){
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_price = number_format($row['post_price'],0);
                            $post_length = $row['post_length'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $brand_title = $row['brand_title'];
                            $brand_id = $row['brand_id'];
                            
                            ?>
                        
                            <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <a href="/hairline/buy/<?php echo $post_id; ?>"><img src="/hairline/img/posts/<?php echo imagePlaceholder($post_image); ?>" alt=""></a>
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
                                    <a href="/hairline/buy/<?php echo $post_id; ?>"><button class="btn mb-5 p_btns"><i class="fas fa-money-bill-wave"></i> Buy</button></a>
                                </div>
                            </div>
						</div>
                        
                         <?php } } } ?>

                    </div>
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        <ul class="pagination mt-50 mb-70">
                            
                            <?php 

                            echo "<li class='page-item'><a class='page-link' href=''><i class='fa fa-angle-left'></i></a></li>";

                            for ($i=1; $i <= $count; $i++) { 
                                


                                if ($i == $page) {
                                    echo "<li class='page-item'><a class='page-link active_link' href='/hairline/shop/{$i}'>{$i}</a></li>";
                                } else{
                                    echo "<li class='page-item'><a class='page-link' href='/hairline/shop/{$i}'>{$i}</a></li>";
                                }
                            }

                            echo "<li class='page-item'><a class='page-link' href=''><i class='fa fa-angle-right'></i></a></li>";

                             ?>
                             
                        </ul>
                    </nav>
				</div>
			</div>
		</div>
	</section>
    <!-- Category section end -->
    
    <?php include "includes/footer.php"; ?>