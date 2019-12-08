<?php
require_once 'functions/general-functions.php';
require_once 'functions/auth-functions.php';


// logout and redirect user to home page.

log_out_user();
$_SESSION['message'] = "You have been logged out";
redirect_to('index.php');
