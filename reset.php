<?php include "includes/db.php"; ?>
<?php include "admin/functions.php"; ?>

<?php include "includes/login_head.php"; ?>


<?php 

    if (!isset($_GET['email']) && !isset($_GET['token'])) {
        
        redirect('/hairline/');


    }

    

    $email = 'hairline@gmail.com';

    $token = 'ce646a131aaa26ae527805ee12ca7dc1bca985c5df12c01ba5b3ee481fafed22852e3c46aadf92516e590b3560e63b22d43b';

    if ($stmt = mysqli_prepare($connection, 'SELECT username, user_email, token FROM users WHERE token= ?')) {
        
        mysqli_stmt_bind_param($stmt, "s", $_GET['token']);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $username, $user_email, $token);

        mysqli_stmt_fetch($stmt);

        mysqli_stmt_close($stmt);

        /*if ($_GET['token'] !== $token || $_GET['email'] !== $email) {
            
            redirect("/hairline/");

        }*/

        if (isset($_POST['password']) && isset($_POST['confirmpassword'])) {
            
            if ($_POST['password'] === $_POST['confirmpassword']) {
                
                $password = $_POST['password'];

                $hash = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));

                if ($stmt = mysqli_prepare($connection, "UPDATE users SET token='', user_password='$hash' WHERE user_email= ?")) {
                    
                    mysqli_stmt_bind_param($stmt, "s", $_GET['email']);
                    mysqli_stmt_execute($stmt);

                    if (mysqli_stmt_affected_rows($stmt) >= 1) {
                        
                        redirect('/hairline/admin/login.php');

                    }

                    mysqli_stmt_close($stmt);

                }

            }

        }


    }



 ?>
 


    <div class="container">
        <div class="login">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                        <div class="img">
                            <img src="img/logo/logo3.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="row">

                    

                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                        <div class="log">
                            <h2>Reset Password</h2>
                        </div>
                        <div class="log_form">
                            <form action="" method="post" class="col-12 settings">
                                <div class="row">
                                    <div class="form-group col-xl-12 col-md-12 col-sm-12">
                                        <label for=""></label>
                                        <div class="form-group inner-addon left-addon">
                                            <!--<i class="fa fa-file-o"></i>-->
                                            <input type="password" name="password" required="" class=" border-lg" id="" placeholder="">
                                            <label alt='Enter Password' placeholder='Password Here'></label>
                                            <input type="password" name="confirmpassword" required="" class=" border-lg" id="" placeholder="">
                                            <label alt='Confirm Password' placeholder='Confirm Password'></label> 
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="resetpass" class="btn mb-4 p_btn col">Reset</button>

                                <input type="hidden" class="hide" name="token" id="token" value="">
                                <div class="link mb-3">
                                    <a style="margin:0 0 0 100px;" href="login.php">Back to Login</a>
                                </div>
                            </form>
                        </div>

                    </div>
                    
                    

                        

                    

                </div>
            </div>
        </div>
        <div class="footer">
            <div class="container">
                <p class="text-white text-center mt-5">Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | BlessingHairline</p>
            </div>
        </div>
    </div>






















	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="bootstrap-4.1.3/dist/js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>