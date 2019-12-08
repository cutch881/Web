<?php
require_once 'functions/config.inc.php';
require_once 'functions/db-functions.inc.php';
require_once 'functions/general-functions.php';
require_once 'functions/auth-functions.php';
include "includes/header.php";

require_login();

//checks if portfolio is being updated
if (isset($_POST['symbol'])  && isset($_POST['amount'])) {
  //makes sure that portfolio already exists
  if(check_portfolio($connection, $_SESSION['user_id'], $_POST['symbol'])){
    //makes sure update is an actual update
    if($_POST['amount'] != 0){
      update_portfolio($connection, $_SESSION['user_id'], $_POST['symbol'], $_POST['amount']); //sets update message
      $_SESSION['message'] = "Succesfully Updated ".$_POST['symbol'];
    }
  }
  //creates portfolio if does not already exist
  else{
    set_portfolio($connection, $_SESSION['user_id'], $_POST['symbol'], $_POST['amount']);
    $_SESSION['message'] = "Succesfully Added ".$_POST['symbol']." to Portfolio";
  }
  unset($_POST);
  header("Location: ".$_SERVER['PHP_SELF']);
  exit;
}
?>
<div id="preload"><h1 id="loadTitle">Portfolio</h1><div id="loader"></div></div>
<div class="content">
<h1 id="companyTitle">Portfolio</h1> 
<?php 
display_message($_SESSION['message']); //calls function to display message
//checks if portfolio is populated
if (get_all_portfolios($connection, $_SESSION['user_id'])->rowCount()>0) {
  $rows = get_all_portfolios($connection, $_SESSION['user_id']);
  if($rows) {
    echo "<div><h2 id='total'>Total Value of Portfolio: </h2></div>";
    echo "<table id='porTable'>";
    $symbols = array();
    foreach ($rows as $row) { ?>
    <tr class='<?= $row['symbol'] ?>'>
        <td><img class="companyImg" src="logos/<?= $row['symbol'] ?>.svg"></td>
        <td class="symbol"><p><a href="./single-company.php?symbol=<?= $row['symbol'] ?>"><?= $row['symbol'] ?></a></p></td>
        <td class="name"><a href="./single-company.php?symbol=<?= $row['symbol'] ?>"><?= $row['name'] ?></a></td>
      </tr>
      <tr class='<?= $row['symbol'] ?>'>
        <td class="amount">Shares: <p><?= $row['amount'] ?></p></td>
        <td class="close"></td>
        <td class="value"></td>
      </tr>
      <tr class='<?= $row['symbol'] ?>'>
        <td colspan="2"><form action='portfolio.php' method='post'><input type='number' min=<?='-'.$row['amount']?> max='999999999' name='amount' placeholder='Enter Shares'> 
   <input type='hidden' name='symbol' value='<?= $row['symbol']?>'> <input type='submit' value='Adjust Shares'></form></td>
   <td><a id="removeBtn" href="remove_portfolio.php?symbol=<?= $row['symbol'] ?>"><button type="button">Remove</button></a></td>
      </tr>
    <?php
    array_push($symbols, $row['symbol']);
    }
    echo "</table>";
  }
} else {
  echo "<div>You have not set any companies to your portfolio. Visit the <a href='list.php'>COMPANIES</a> page to add to your portfolio.</div>";
}
$connection = null;
unset($_SESSION['message']);
?><script type="text/javascript" src="js/portfolioStock.js"></script> </div><?php
include "includes/footer.php";

?>
