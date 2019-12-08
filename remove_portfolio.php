<?php
require_once 'functions/config.inc.php';
require_once 'functions/db-functions.inc.php';
require_once 'functions/general-functions.php';
require_once 'functions/auth-functions.php';
include "includes/header.php";

require_login();

if (isset($_GET['symbol'])) {
    remove_portfolio($connection, $_SESSION['user_id'], $_GET['symbol']);
    $_SESSION['message'] = "Succesfully Removed ".$_GET['symbol']." from Portfolio";
    redirect_to('portfolio.php');
} else {
    redirect_to('portfolio.php');
}

$connection = null;

include "includes/footer.php";
