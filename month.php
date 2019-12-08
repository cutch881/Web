
<?php
require_once 'functions/config.inc.php';
require_once 'functions/general-functions.php';
require_once 'functions/auth-functions.php';
include "includes/header.php";

if (isset($_GET['symbol'])) { // if get request is made with symbol
    $symbol=$_GET['symbol']; // get the symbol 
}
?>
<script type="text/javascript" src="js/monthstock.js"></script>

<!-- Table of month stock data for the company -->
<div class="content">
  <div id ="compSymb"><?php echo $symbol?></div> <!--The text content in this is used by monthstock.js -->
      <table id ="data">

      </table>
</div>

<?php include "includes/footer.php" ?>
