<?php require_once("includes/db.php"); ?>
<?php include "admin/functions.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
    <meta name="description" content=" Blessing Hairline | Online shopping for all kinds of hair">
	<meta name="keywords" content="blessing hairline, eCommerce, hairs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Blessing Hairline</title>

	<link rel="stylesheet" type="text/css" href="/hairline/bootstrap-4.1.3/dist/css/bootstrap.min.css">

	<link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">    

	<link rel="stylesheet" type="text/css" href="/hairline/css/style.css"> 

	<link rel="stylesheet" media="screen" href="/hairline/css/normalize.css" />

	<script src="/hairline/js/countdown.js"></script>

	<style>
      body {
        font-family: 'Open Sans', sans-serif;
      }
    </style>

</head>

<body>
	
	<div class="countdown">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 mt-5">
					<div class="img">
						<img src="img/logo/logo1.png" alt="">
					</div>
					<div class="name">
						<h2>BLESSING HAIRLINE COMPANY</h2>
					</div>
					<div class="coming">
						<h3>COMING SOON</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12" id="not">
					<?php  

					    if (isset($_POST['email'])) {

					        $to = "onyedikachukwu64@gmail.com";
					        $name = wordwrap($_POST['name'], 70);
    						$body = $_POST['body'];
					        $header = "From: " .$_POST['email'];

					        mail($to, $name, $body, $header);

					        $data = '';

						    $data .= '<div class="text-center"> 
						                <h5 class="bg-success text-light rounded p-2"><i class="fas fa-check-double"></i> Sent</h5>
						            </div>';
						    echo $data;

					    }

					?>
					<div id="CDT"></div>
					<div class="form">
						<form action="" method="post" id="notify">
							<div class="form-row">
								<input type="hidden" name="name" class="text" placeholder="Email">
								<input type="hidden" name="body" class="text" placeholder="Email">
							    <input type="text" name="email" class="text" placeholder="Email">
							    
							    <button type="submit" name="notify" class="btns_notify">NOTIFY ME</button>   
							</div>
						</form>
						<p>Be the first to know when our store launches! Tou will also get exclusive discounts, pre-launch sneak peaks, and more.</p>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="ab">
					<div class="col-md-12 p-3 text-center text-white">
						<h2>ABOUT US</h2>
						<p>
							After almost a decade as an influencer, I’ve worked with and tried some of the best and the worst hair in the industry. I’ve narrowed it down and I’ve found that RAW hair is the most consistent in quality, mainly because it comes straight from the donor with very little to no manipulation.
						</p>
						<p>
							I’ve heard a lot of your complaints when it comes to the inconsistencies in the hair market so&nbsp; I’ve spent several years researching, studying, and sourcing the best hair. That’s how I came up with the Peakmill Raw Hair Collection.
						</p>
						<h3>THANK YOU FOR CHOOSING BLESSING HAIRLINE.</h3>
					</div>
				</div>
			</div>
		</div>
	</div>

  
		







		<script src="/hairline/bootstrap-4.1.3/dist/js/bootstrap.min.js"></script>


		<script type="text/javascript">
			function CountdownTimer(elm,tl,mes){
			 this.initialize.apply(this,arguments);
			}
			CountdownTimer.prototype={
			 initialize:function(elm,tl,mes) {
			  this.elem = document.getElementById(elm);
			  this.tl = tl;
			  this.mes = mes;
			 },countDown:function(){
			  var timer='';
			  var today=new Date();
			  var day=Math.floor((this.tl-today)/(24*60*60*1000));
			  var hour=Math.floor(((this.tl-today)%(24*60*60*1000))/(60*60*1000));
			  var min=Math.floor(((this.tl-today)%(24*60*60*1000))/(60*1000))%60;
			  var sec=Math.floor(((this.tl-today)%(24*60*60*1000))/1000)%60%60;
			  var me=this;

			  if( ( this.tl - today ) > 0 ){
			   timer += '<span class="number-wrapper"><div class="line"></div><div class="caption">DAYS</div><span class="number day">'+day+'</span></span>';
			   timer += '<span class="number-wrapper"><div class="line"></div><div class="caption">HOURS</div><span class="number hour">'+hour+'</span></span>';
			   timer += '<span class="number-wrapper"><div class="line"></div><div class="caption">MINS</div><span class="number min">'+this.addZero(min)+'</span></span><span class="number-wrapper"><div class="line"></div><div class="caption">SECS</div><span class="number sec">'+this.addZero(sec)+'</span></span>';
			   this.elem.innerHTML = timer;
			   tid = setTimeout( function(){me.countDown();},10 );
			  }else{
			   this.elem.innerHTML = this.mes;
			   return;
			  }
			 },addZero:function(num){ return ('0'+num).slice(-2); }
			}
			function CDT(){

			 // Set countdown limit
			 var tl = new Date('2020/09/27 09:00:00');

			 // You can add time's up message here
			 var timer = new CountdownTimer('CDT',tl,'<span class="number-wrapper"><div class="line"></div><span class="number end">Time is up!</span></span>');
			 timer.countDown();
			}
			window.onload=function(){
			 CDT();
			}
		</script>

		<script>
			$(document).ready(function(){	

				$("#notify").submit(function(e){
					e.preventDefault();
					$.ajax({
						url: 'countdown.php',
						method: 'post',
						data: $('form').serialize(),
						success:function(response){
							$("#not").html(response);
						}
					});
				});
			});
		</script>
		
	</body>

</html>

















