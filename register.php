<!-- <?php //include "includes/db.php"; ?>
<?php //include "includes/login_head.php"; ?>
<?php //include "admin/functions.php"; ?>


<?php 
/*
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load(); 

$options = array(
    'cluster' => 'us2',
    'useTLS' => true
  );

$pusher = new Pusher\Pusher(getenv('APP_KEY'), getenv('APP_SECRET'), getenv('APP_ID'), $options);


if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $error = [
        'username'=> '',
        'email'=> '',
        'password'=> ''

    ];

    if (strlen($username) < 4) {
        
        $error['username'] = 'Username needs to be longer than 4 characters';
    }

    if ($username == '') {
        
        $error['username'] = 'Username cannot be empty';
    }

    if (username_exists($username)) {
        
        $error['username'] = 'Username already exists';
    }


    if ($email == '') {
        
        $error['email'] = 'Email cannot be empty';
    }

    if (email_exists($email)) {
        
        $error['email'] = 'Email already exists';
    }


    if ($password == '') {
        
        $error['password'] = 'Password cannot be empty';
    }

    if (strlen($password) < 6) {
        
        $error['password'] = 'Password needs to be at least 6 characters';
    }


    foreach ($error as $key => $value) {
        
        if (empty($value)) {
            
            unset($error[$key]);

        }
    } // foreach


    if (empty($error)) {

        register_user($username, $email, $password);

        $data['message'] = $username;

        $pusher->trigger('notifications', 'new_user', $data);

        login_user($username, $password);
    }
    
}
*/



?>
-->


    <div class="container">
        <div class="login">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                        <div class="img">
                            <img src="img/logo/logo3.png" alt="" class="img-fluid">
                        </div></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                        <div class="log">
                            <h2>Register Here!!!</h2>
                        </div>
                        <div class="log_form">
                            <form action="" method="post" class="col-12 settings">
                                <div class="row">
                                    <div class="form-group col-xl-12 col-md-12 col-sm-12">
                                        
                                        <label for=""></label>
                                        <div class="form-group inner-addon left-addon">
                                            <p style="font-size: 14px;color: red;text-align: left;font-weight: bold;"><?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                                            <input type="text" name="username" required="" class=" border-lg" id="" placeholder="" autocomplete="on" value="<?php echo isset($username) ? $username : '' ?>">
                                            <label alt='Username' placeholder='Username Here'></label> 
                                        </div>
                                        <label for=""></label>
                                        <div class="form-group inner-addon left-addon">
                                            <p style="font-size: 14px;color: red;text-align: left;font-weight: bold;"><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
                                            <!--<i class="fa fa-list-alt"></i>-->
                                            <input type="text" name="email" required="" class="border-lg" id="" placeholder="" autocomplete="on" value="<?php echo isset($email) ? $email : '' ?>">
                                            <label alt='Email' placeholder='Email Here'></label> 
                                        </div>
                                        <label for=""></label>
                                        <div class="form-group inner-addon left-addon">
                                            <p style="font-size: 14px;color: red;text-align: left;font-weight: bold;"><?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                                            <!--<i class="fa fa-list-alt"></i>-->
                                            <input type="password" name="password" required="" class="border-lg" id="" placeholder="">
                                            <label alt='Password' placeholder='Password Here'></label> 
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" disabled="" name="register" class="btn mb-4 p_btn col">Register</button>
                                <div class="link mb-3">
                                    <a style="margin:0 0 0 100px;" href="forgot.php">Forgot Password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<?php include "includes/login_foot.php"; ?>