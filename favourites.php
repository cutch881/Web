<?php
require_once 'functions/config.inc.php';
require_once 'functions/db-functions.inc.php';
require_once 'functions/general-functions.php';
require_once 'functions/auth-functions.php';
include "includes/header.php";

require_login(); //makes sure user is logged in 

// check if method is post and check if remove favourites button was pressed
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rem_favourites'])) {
    // remove all favourites
    unset($_SESSION['favourites '.$_SESSION['user_id']]);
    $_SESSION['message'] = "All favourites have been removed";
}

// check to see if get request and symbol is set
if (isset($_GET['symbol'])) {
    // store favourites in unique session.
    $_SESSION['favourites '.$_SESSION['user_id']][] = $_GET['symbol'];
    $_SESSION['message'] = $_GET['symbol'] . " Has been added to your favourites";
}

// start content div
echo "<div class='content'>";
echo "<h1 id='companyTitle'>Favourites</h1>";
// check if favourites are set and not empty
if (isset($_SESSION['favourites '.$_SESSION['user_id']]) && !empty($_SESSION['favourites '.$_SESSION['user_id']])) {
    // get favourites equal to the favourites stored in session and output.
    $rows = get_companies_where($connection, $_SESSION['favourites '.$_SESSION['user_id']]);
    if ($rows) {
        // check if message is set and display status

        display_message($_SESSION['message']);
        
        echo "<table id = 'favTable'>";
        foreach ($rows as $row) {
            ?>
      <tr>
        <td><img class="companyImg" src="logos/<?= $row['symbol'] ?>.svg"></td>
        <td><a href="./single-company.php?symbol=<?= $row['symbol'] ?>"><?= $row['symbol'] ?></a></td>
        <td><a href="./single-company.php?symbol=<?= $row['symbol'] ?>"><?= $row['name'] ?></a></td>
        <td><a id="removeBtn" href="remove_favourite.php?symbol=<?= $row['symbol'] ?>"><button type="button">Remove</button></a></td>
      </tr>
    <?php
        }
        echo "</table>"; ?>
    <form action="favourites.php" method="post">
      <input id="removeFavourites" type="submit" name="rem_favourites" value="Remove All Favourites" />
    </form>
  <?php
    } else {
        echo "<p>You have no favourites set. Visit the <a href='list.php'>companies</a> page to add favourites.</p>";
    }
} else {
    // check if message is set and display status
    display_message($_SESSION['message']);
    echo "<p>You have no favourites set. Visit the <a href='list.php'>companies</a> page to add favourites.</p>";
}

echo "</div>";

$connection = null;
unset($_SESSION['message']);

include "includes/footer.php";

?>
