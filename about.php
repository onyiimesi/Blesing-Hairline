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
			<h4>About Us PAge</h4>
			<div class="site-pagination">
				<a href="index.php">Home</a> /
                <a href="about.php">About</a>
			</div>
		</div>
	</div>
    <!-- Page info end -->

    <!-- Contact section -->
	<section class="about-section">
		<div class="container">
            <div class="row">

                <?php  

                    $query = "SELECT * FROM about";
                    $query_about_run = mysqli_query($connection,$query);

                    while ($row = mysqli_fetch_assoc($query_about_run)) {
                        $about_title = $row['about_title'];
                        $about_story = $row['about_story'];
                        $about_image = $row['about_img'];
                    }

                ?>

                <div class="col-md-5 col-sm-6">
                    <img src="img/posts/book/<?php echo imagePlaceholder($about_image); ?>" alt="">
                </div>
                <div class="col-md-7 col-sm-6">

                    <div class="abt_heading">
                        <div class="ml-md-0 abt">
                            <h2 class="mb-4"><?php echo $about_title; ?></h2>
                        </div>
                    </div>
                    <p>
                        <?php echo $about_story; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="abt_happy spad ftco-section ftco-counter" id="section-counter" style="background: #f5f5f5;">
		<div class="container">
			<h2>Our Acheivements</h2>
    		<div class="row justify-content-center py-5">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="10000">0</strong>
		                <span>Happy Customers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Branches</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="1000">0</strong>
		                <span>Partners</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Awards</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
	</section>
	<!-- Contact section end -->

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