<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "admin/functions.php"; ?>

<?php 



if (isset($_POST['contact'])) {
    
    $to = "blessingade66@gmail.com";
    $name = wordwrap($_POST['name'], 70);
    $body = $_POST['body'];
    $header = "From: " .$_POST['email'];

    mail($to, $name, $body, $header);


}




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
			<h4>Contact Us PAge</h4>
			<div class="site-pagination">
				<a href="index.php">Home</a> /
                <a href="contact.php">Contact</a>
			</div>
		</div>
	</div>
    <!-- Page info end -->

    <!-- Contact section -->
	<section class="contact-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-sm-12 contact-info">
					<h3>Get in touch</h3>
					<p>Ojudu Berger, Lagos Nigeria.</p>
					<p>+234 801 234 5679</p>
					<p><a class="mail" target="_blank" href="mailto:blessingade66@gmail.com">blessingade66@gmail.com</a></p>
					<div class="contact-social">
						<a href="https://www.instagram.com/blessinghairline" target="_blank"><i class="fab fa-instagram"></i></a>
					</div>
					<form action="" method="post" class="contact-form">
                        <input type="email" name="email" placeholder="Your E-mail">
						<input type="text" name="name" placeholder="Your Name">						
						<textarea name="body" placeholder="Message"></textarea>
						<button class="site-btn" name="contact">SEND NOW</button>
					</form>
				</div>
				<div class="col-lg-6 col-sm-12 contact-infos">
					<div id="mapBox" class="mapBox row m0"
						data-lat="6.4816"
						data-lon="3.3354"
						data-zoom="14"
						data-marker="img/map-marker.png"
						data-info="Broadway Hotel"
						data-mlat="6.4816"
						data-mlon="3.3354">
					</div>
				</div>
			</div>
		</div>
		
	</section>
	<!-- Contact section end -->

    
    <?php include "includes/footer.php"; ?>