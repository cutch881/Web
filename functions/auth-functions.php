<?php

session_start();

// actions to login user
function log_in_user($user) {
  session_regenerate_id();
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['last_login'] = time();
  $_SESSION['username'] = $user['email'];
  return true;
}

// Performs all actions necessary to log out an user
function log_out_user() {
  unset($_SESSION['user_id']);
  unset($_SESSION['last_login']);
  unset($_SESSION['email']);
  return true;
}


// checks if user is logged in
function is_logged_in() {
  return isset($_SESSION['user_id']);
}

// redirect to login if required
function require_login() {
  if(!is_logged_in()) {
    redirect_to("login.php");
  } else {
    // Do nothing, let the rest of the page proceed
  }
}

?>
