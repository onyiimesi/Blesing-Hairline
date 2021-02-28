<?php ob_start(); ?>
<?php session_start(); ?>


<?php 

$_SESSION['email'] = null;
$_SESSION['fname'] = null;
$_SESSION['username'] = null;

header("Location: /hairline/");

?>