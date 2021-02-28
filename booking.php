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
			<h4>Booking PAge</h4>
			<div class="site-pagination">
				<a href="index.php">Home</a> /
                <a href="booking.php">Booking</a>
			</div>
		</div>
	</div>
    <!-- Page info end -->

    <section class="booking-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 b order-lg-1">

                    <div class="booking-info">
                        <h2>Place Your Booking Here!</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
                        </p>
                    </div>
                    <div class="step-info">
                        <h3>Steps To Book</h3>
                        <div class="container">
                            <ol>
                                <li>
                                    Click on your preferred booking slot on the right hand side.
                                </li>
                                <li>
                                    Fill the form provided.
                                </li>
                                <li>
                                    Select the number of slots you want.
                                </li>
                                <li>
                                    Hit the Book button
                                </li>
                            </ol>
                        </div>
        
                    </div>
                    <div class="note-info">
                        <h6><span style="color: red;">Note:</span> Payments must be made before booking.</h6>
                    </div>
                </div>

                    <?php 
                    
                        
                        $query = "SELECT * FROM booking";
                        $query_post_run = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($query_post_run)){
                            $id = $row['id'];
                            $book_title = $row['book_title'];
                            $book_price = $row['book_price'];
                            $book_image = $row['book_image'];
                            $book_desc = $row['book_desc'];
                            $book_date = $row['book_date'];
                            $book_time = $row['book_time'];
                            $book_location = $row['book_location'];

                            ?>
   
                <div class="col-lg-6 order-lg-1">
                    <div class="pi-pic">
                        <a href="slots/<?php echo $id; ?>"><img src="/hairline/img/posts/book/<?php echo imagePlaceholder($book_image); ?>" alt=""></a>
                        <h5 class="pt-3"><?php echo $book_title; ?></h5>
                    </div>
                </div>
                <?php   } ?>
                
            </div>
            <?php  

                $stmt = $connection->prepare("SELECT * FROM booking");
                $stmt->execute();
                $stmt->store_result();
                $rows = $stmt->num_rows();

                if ($rows < 1) {
                       echo "<h3 class='text-center text-danger'>No Booking Available!</h3>";
                    }    

            ?>
        </div>
    </section>
    
   <?php include "includes/footer.php"; ?>