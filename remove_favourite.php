<?php
require_once 'functions/config.inc.php';
require_once 'functions/db-functions.inc.php';
require_once 'functions/general-functions.php';
require_once 'functions/auth-functions.php';
include "includes/header.php";

if (isset($_GET['symbol'])) {
    // removes chosen stock only out of session.
    $_SESSION['favourites '.$_SESSION['user_id']] = array_diff($_SESSION['favourites '.$_SESSION['user_id']], array($_GET['symbol']));
    $_SESSION['message'] = $_GET['symbol'] . " has been removed from your portfolio";
    redirect_to('favourites.php');
} else {
    redirect_to('favourites.php');
}

$connection = null;

include "includes/footer.php";
