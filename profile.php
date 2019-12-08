<?php
require_once 'functions/config.inc.php';
require_once 'functions/db-functions.inc.php';
require_once 'functions/general-functions.php';
require_once 'functions/auth-functions.php';
include 'includes/header.php';
?>

<?php
require_login();//checks if user is logged in 

//if the session is for specific user 
//set up the profile to be personalized 
if (isset($_SESSION['username'])) 
{
    $row = get_user_profile($_SESSION['username'], $connection); //the row based on username from the DB
    if ($row) {
      $firstname=$row['firstname']; // reterive first name from row 
      $lastname=$row['lastname']; // reterive last name from row 
      $city=$row['city']; //reterive city from row 
      $country=$row['country'];// reterive country from row 
      $email=$row['email']; //reterive email from row 
      $img = "https://randomuser.me/api/portraits/women/" . $_SESSION['user_id'] . ".jpg"; //set up user image
    } 
    //user does not exist 
    else {
      echo "could not get user information"; 
    }
}

$connection = null;
?>


<!----------Display user info--------------->
<div class="content">
  <h1>Profile</h1>
  <img id="profilePicture" src="<?= $img ?>" alt="Profile Picture">

    <div id="profileContainer">
        <label class="label">Full Name</label><p><?php echo "$firstname $lastname"; ?></p>
        <label class="label">City</label><p><?= $city ?></p>
        <label class="label">Country</label><p><?= $country ?></p>
        <label class="label">Email</label><p><?= $email ?></p>
    </div>
</div>




<?php
include 'includes/footer.php';

?>
