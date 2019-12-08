<?php
require_once 'functions/config.inc.php';
require_once 'functions/db-functions.inc.php';
require_once 'functions/general-functions.php';
require_once 'functions/auth-functions.php';
include "includes/header.php";

$errors = [];

//if post request is made to signup
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  //All the information entered by the user is stored in the variables below 
  $user[':firstName'] = $_POST['firstName'];
  $user[':lastName'] = $_POST['lastName'];
  $user[':city'] = $_POST['city'];
  $user[':country'] = $_POST['country'];
  $user[':email'] = $_POST['email'];
  $user[':password'] = $_POST['password'];
  $user[':confirmPassword'] = $_POST['confirmPassword'];

  $result = insertUser($user, $connection); //adds user to the database 
  
  //if insert is sucessful send user to the index page 
  if($result === true) {
    $user = get_single_user(array($_POST['email']), $connection);
        if ($user) {
            log_in_user($user);
        }
    $_SESSION['message'] = "Your account has been created!";
    redirect_to("index.php");
  } 
  //display error if signup is not sucessful
  else {
    $errors = $result;
  }
} 

else {
  $user[':firstName'] = "";
  $user[':lastName'] = "";
  $user[':city'] = "";
  $user[':country'] = "";
  $user[':email'] = "";
}

$connection = null;
?>

<script type="text/javascript" src="js/signUpValidation.js"></script>

<div class="content">
<h1>Sign Up</h1>
<h3>Note: You will not be able to submit if there are errors in the form</h3> <br/>

<?php display_errors($errors); ?>

<form action="signup.php" method="post" id='signup'>
  
   <p id = "error1"></p>  <input id = 'fn' type="text" name="firstName" autocomplete='off' value="<?= $user[':firstName'] ?>" placeholder="First Name" /> <br />
   <p id = "error2"></p>  <input id = 'ln' type="text" name="lastName" autocomplete='off' value="<?= $user[':lastName'] ?>" placeholder="Last Name" /> <br />
   <p id = "error3"></p>  <input id = 'city' type="text" name="city" autocomplete='off' value="<?= $user[':city'] ?>" placeholder="City" /><br />
   <p id ="error4"></p>   <input id ='country' type="text" name="country" autocomplete='off' value="<?= $user[':country'] ?>" placeholder="Country" /> <br />
   <p id ="error5"></p>   <input id ='email' type="text" name="email" autocomplete='off' value="<?= $user[':email'] ?>" placeholder="Email" /> <br />
   <p id ="error6"></p>   <input id ='pw' type="password" name="password" autocomplete='off' value="" placeholder="Password" /><br />
   <p id ="error7"></p>   <input id= 'confPw' type="password" name="confirmPassword" autocomplete='off' value="" placeholder="Confirm Password" /> <br /></br>

  <input type="submit" name="submit" value="Submit"  id='signupButton' />
</form>

</div>

<?php include "includes/footer.php" ?>
