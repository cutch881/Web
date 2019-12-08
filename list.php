<?php
require_once './functions/config.inc.php';
require_once './functions/auth-functions.php';
include "./includes/header.php";
?>

<!------This page contains the company table------>
<script type="text/javascript" src="js/fetchCompanies.js"></script>

<!------Circle loader for screen when fetching------>
<div id="preload"><h1 id="loadTitle">Companies</h1><div id="loader"></div></div>

<!-------------Company table------------->
<div class="content">
    <h1 id = companyTitle>Companies</h1>
    <div id = filter>
      <input id="input" type="search" name="search" placeholder="Company Search">
      <button type="button" name="search">Go</button>
    </div>
    <div id="companiesList">
      <table id="companyTable">
      </table>
    </div>
</div>
<?php include "includes/footer.php" ?>
