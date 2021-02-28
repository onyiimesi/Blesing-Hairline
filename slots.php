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
			<h4>Slot's PAge</h4>
			<div class="site-pagination">
				<a href="index.php">Home</a> /
                <a href="booking.php">Booking</a> /
                <a href="slots.php">Slots</a>
			</div>
		</div>
	</div>
    <!-- Page info end -->

    <section class="slots-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 b order-lg-1">

                    <?php 
                    
                        if(isset($_GET['p_id'])){
                            $post_id = $_GET['p_id'];
                        }
                        
                        $query = "SELECT * FROM booking WHERE id = $post_id ";
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

                            <div class="booking-info">
                                <div class="pi-pic">
                                    <img src="/hairline/img/posts/book/<?php echo imagePlaceholder($book_image); ?>" alt="">
                                </div>
                                <h2><?php echo $book_title; ?></h2>
                                <p>
                                    <?php echo $book_desc; ?>
                                </p>
                            </div>
                            <div class="session-info">
                                <h3>Class Session</h3>
                                <table class="bordered-less">
                                    <tr>
                                        <th>Date:</th>
                                        <td><?php echo $book_date; ?></td>                             
                                    </tr>
                                    <tr>
                                        <th>Location:</th>
                                        <td><?php echo $book_location; ?></td>                             
                                    </tr>
                                    <tr>
                                        <th>Time:</th>
                                        <td><?php echo $book_time; ?></td>                             
                                    </tr>
                                    <tr>
                                        <th>Price:</th>
                                        <td><?php echo $book_price; ?></td>                             
                                    </tr>

                               <?php   } ?>       
                        </table>
                    </div>
                </div>
                
                <div class="col-lg-6 order-lg-1">
                    <h3>Fill in the form</h3>
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">No Of Slot</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option selected>Choose</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Payment type</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option selected>Choose</option>
                                <option>Bank Transfer</option>
                                <option>Pay In Cash</option>
                            </select>
                        </div>
                        <button type="submit" class="btn p_btn">Book</button>
                    </form>

                  
                </div>
            </div>
        </div>
    </section>


    <section class="slots-list spad">
      <div class="container">
          <div class="other">
              <h3>OTHER SLOTS</h3>
          </div><hr>
          <span style="width: 30%; height: 10px; background: #e175cb;"></span>
        <div class="row">
            <?php 
                        
                $query = "SELECT * FROM booking order by id DESC LIMIT 4 ";
                $query_post_run = mysqli_query($connection,$query);

                if (mysqli_num_rows($query_post_run) < 1) {

                    echo "<h3>NO POST AVAILABLE</h3>";

                }else{

                while($row = mysqli_fetch_assoc($query_post_run)){
                    $id = $row['id'];
                    $book_title = $row['book_title'];
                    $book_image = $row['book_image'];
                    $book_desc = $row['book_desc'];
                    
                    ?>
            <div class="col-md-3">
                <div class="pi-pic">
                    <a href="/hairline/slots/<?php echo $id; ?>"><img src="/hairline/img/posts/book/<?php echo imagePlaceholder($book_image); ?>"></a>
                    <span class="pt-3"><?php echo $book_title; ?></span>
                </div>
            </div>

            <?php  } } ?>
            
        </div>
      </div>
    </section>
    
    <?php include "includes/footer.php"; ?>