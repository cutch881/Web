<?php
  require_once 'functions/auth-functions.php';
  require_once 'functions/general-functions.php';
  include 'includes/header.php';

?>
<script type="text/javascript" src="js/mainMenu.js"></script>
<div class='content'>
  <?php display_message($_SESSION['message']); ?>
</div>
<main class="cards">
    
    <div id="about"><i class="fa fa-info-circle fa-2x"></i><a href="./about.php">About</a></div>
    <div id="companies"><i class="fa fa-building fa-2x"></i><a href="./list.php">Companies</a></div>

    <!-- only display items if looged in -->
    <?php if (is_logged_in()) {
    ?>
      <div id="portfolio"><i class="fa fa-folder-open fa-2x"></i><a href='./portfolio.php'>Portfolio</a></div>
      <div id="favourites"><i class="fa fa-star fa-2x"></i><a href='./favourites.php'>Favourites</a></div>
      <div id="profile"><i class="fa fa-user-circle fa-2x"></i><a href="./profile.php">Profile</a></div>
      <div id="logout"><i class="fa fa-unlock-alt fa-2x"></i><a href="./logout.php">Logout</a></div>
    <?php
} else {
        ?>
      <div id="login"><i class="fa fa-key fa-2x"></i><a href="./login.php">Login</a></div>
      <div id="signup"><i class="fa fa-check-circle fa-2x"></i><a href="./signup.php">Sign Up</a></div>
    <?php
    } ?>
</main>
<?php 

unset($_SESSION['message']);
include './includes/footer.php'; 

?>
