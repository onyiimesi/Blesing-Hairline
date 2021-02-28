<?php require_once("includes/db.php"); ?>
<?php include "admin/functions.php"; ?>

<?php  

    if (isset($_POST['review_name'])) {
        
        $name = escape($_POST['review_name']);
        $text = escape($_POST['review_text']);
        $status = escape($_POST['status'] = 'unapproved');
        $post_date = escape(date('Y-M-d h:i a'));

        $data = '';


        $stmt = $connection->prepare("INSERT INTO review(review_name,review_text,status,review_date)VALUES(?,?,?,?)");

	    $stmt->bind_param("ssss",$name,$text,$status,$post_date);

	    $stmt->execute();

	    $data .= '<div class="text-center"> 
	                <h5 class="bg-success text-light rounded p-2"><i class="fas fa-check-double"></i> Your Review Has Been Sent!. Thanks for your time.</h5>
	            </div>';
	    echo $data;

    }

?>