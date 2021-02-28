<?php require_once("includes/db.php"); ?>
<?php include "admin/functions.php"; ?>


<?php

	$query = "SELECT * FROM user_account";
    $select_randSalt_query = mysqli_query($connection, $query);
    
    if(!$select_randSalt_query){
        die("QUERY FAILED" . mysqli_error($connection));
    }

    $row = mysqli_fetch_array($select_randSalt_query);

    $salt = $row['salt']; 


		
	if (isset($_POST['fname'])) {
	    $fname = $_POST['fname'];
	    $username = $_POST['username'];
	    $email = $_POST['email'];    
	    $password = $_POST['password'];

	    $error = [
	        'fname'=> '',
	        'email'=> '',
	        'username'=> '',
	        'password'=> ''

	    ];

	    if (strlen($fname) < 4) {
        
	        $error['fname'] = 'Full Name needs to be longer than 4 characters';
	    }

	    if (strlen($username) < 4) {
        
	        $error['fname'] = 'Username needs to be longer than 4 characters';
	    }


	    if (email_exists($email)) {
	        
	        $error['email'] = 'Email already exists';
	    }



	    if (strlen($password) < 6) {
        
	        $error['password'] = 'Password needs to be at least 6 characters';
	    }

	    foreach ($error as $key => $value) {
        
	        if (empty($value)) {
	            
	            unset($error[$key]);

	        }
	    }

	    $password = crypt($password, $salt);
	    
	    $data = '';

	    if (empty($error)) {

		    $stmt = $connection->prepare("INSERT INTO user_account (fname,username,email,password)VALUES(?,?,?,?)");

		    $stmt->bind_param("ssss",$fname,$username,$email,$password);

		    $stmt->execute();

		    
		    $data .= '<div class="text-center"> 
		                <h5 class="mt-2 text-success">Registration Successful!</h5>
		            </div>';
		    echo $data;
		} else{
			$data .= '<div class="text-center">
						<span class="mt-2 text-info">A PROBLEM OCCURED EITHER BECAUSE: </span><hr>
						<h6 class="mt-2 text-danger">Full Name needs to be longer than 4 characters</h5> or
						<h6 class="mt-2 text-danger">Username needs to be longer than 4 characters</h6> or 
		                <h6 class="mt-2 text-danger">Email already exists</h5> or
		                <h6 class="mt-2 text-danger">Password needs to be at least 6 characters</h5>
		            </div>';
		    echo $data;
		}
	}
?>


<?php  

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
	    
	    $email = mysqli_real_escape_string($connection, $email);
	    $password = mysqli_real_escape_string($connection, $password);
	    
	    $query = "SELECT * FROM user_account WHERE email = '{$email}' ";
	    $select_user_query = mysqli_query($connection, $query);
	    
	    if(!$select_user_query){
	        die("QUERY FAILED". mysqli_error($connection));
	    }
	    
	    while($row = mysqli_fetch_array($select_user_query)){
	        $db_id = $row['user_account_id'];
	        $db_email = $row['email'];
	        $db_password = $row['password'];
	        $db_fname = $row['fname'];
	        $db_username = $row['username'];				        
	    }

	    $password = crypt($password, $db_password);
	    
	    if($email === $db_email && $password === $db_password ){
	        $_SESSION['email'] = $db_email;
	        $_SESSION['fname'] = $db_fname;
	        $_SESSION['username'] = $db_username;
	        
	        redirect("/hairline/");
	        
	    } else{

	        redirect("/hairline/");
	    }
    }

?>