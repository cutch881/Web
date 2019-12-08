<?php
require_once 'functions/config.inc.php';
require_once 'functions/db-functions.inc.php';
require_once 'functions/general-functions.php';
require_once 'functions/auth-functions.php';
include "includes/header.php";

$errors = [];
$username = '';
$password = '';

//post request is made to login
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
   
   //if email is blank call error 
    if (is_blank($_POST['email'])) {
        $errors[] = "Please enter email.";
    }
    //if password id blank call error 
    if (is_blank($_POST['password'])) {
        $errors[] = "Please enter password.";
    }

    //if there are no errors
    if (empty($errors)) {
        $user = get_single_user(array($_POST['email']), $connection); //get the user based on email 
        $failure_message = "Login was unsuccessful.";
        
        if ($user) { //if user email is found 
            if (password_verify($_POST['password'], $user['password'])) { // verify the password 
                log_in_user($user); // login the user 
                redirect_to("index.php"); // take user to index page
            } 
            else { // if login is unscuessful display fail message
                $errors[] = $failure_message;
            }
        } 
        else {//if user email is not found display error 
            $errors[] = $failure_message;
        }
    }
}

?>
<div class="content">
<h1>Log in</h1>

<!-- display errors if any -->
<?php display_errors($errors); ?>

<!-- login form -->
<form action="login.php" method="post">
  <input type="text" name="email" value="" placeholder="Email" /><br />
  <input type="password" name="password" value="" placeholder="Password"/><br />
  <p>Dont have an account? <a id="signLink" href="signup.php">Sign up</a> now!</a></p>
  <input type="submit" name="submit" value="Submit" />
</form>
</div>

<?php 
$connection = null;
include "includes/footer.php" 

?>
