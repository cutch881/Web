<?php

// redirect to page
function redirect_to($location, $status=302)
{
   header('Location: '.$location, true, $status);
   exit();
}

// check if value is blank
function is_blank($value) {
  return !isset($value) || trim($value) === '';
}

// validate user forms
function validate_user($connection, $user) {

  $errors = [];

  if (is_blank($user[':firstName'])) {
    $errors[] = "First name cannot be blank.";
  } elseif (strlen($user[':firstName']) < 2 || strlen($user[':firstName']) > 20 ) {
    $errors[] = "First name must be between 2 and 20 characters";
  }

  if (is_blank($user[':lastName'])) {
    $errors[] = "Last name cannot be blank.";
  } elseif (strlen($user[':lastName']) < 2 || strlen($user[':lastName']) > 20 ) {
    $errors[] = "Last name must be between 2 and 20 characters";
  }

  if (is_blank($user[':city'])) {
    $errors[] = "City cannot be blank.";
  } elseif (strlen($user[':city']) < 2 || strlen($user[':city']) > 20 ) {
    $errors[] = "City must be between 2 and 20 characters";
  }

  if (is_blank($user[':country'])) {
    $errors[] = "Country cannot be blank.";
  } elseif (strlen($user[':country']) < 2 || strlen($user[':country']) > 20 ) {
    $errors[] = "Country must be between 2 and 20 characters";
  }

  if(is_blank($user[':email'])) {
    $errors[] = "Email cannot be blank.";
  } elseif (strlen($user[':email']) > 100 ) {
    $errors[] = "Email name must be less than 100 characters.";
  } elseif (!filter_var($user[':email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email must be a valid email.";
  } elseif (has_unique_email($connection, $user[':email']) == false) {
    $errors[] = "Email already exists.";
  }

  if(is_blank($user[':password'])) {
    $errors[] = "Pasword cannot be blank.";
  } elseif (strlen($user[':password']) < '8') {
    $errors[] = "Password Must Contain At Least 8 Characters";
  }
  elseif(!preg_match("#[0-9]+#",$user[':password'])) {
    $errors[] = "Password Must Contain At Least 1 Number.";
  }
  elseif(!preg_match("#[A-Z]+#",$user[':password'])) {
    $errors[] = "Password Must Contain At Least 1 Capital Letter.";
  } elseif($user[':password'] !== $user[':confirmPassword']) {
    $errors[] = "Passwords dont match.";
  }

  return $errors;
}

// used to display errors
function display_errors($errors=array())
{
  if($errors) {
    echo "<div class='errors'>";
      echo "Please fix the following errors:";
      echo "<ul>";
        foreach ($errors as $error) {
          echo "<li>$error</li>";
        }
      echo "</ul>";
    echo "</div>";
  }
}

function display_message ($message) {
  if (isset($_SESSION['message'])) {
    echo "<div class='message fa fa-check'>" . $message . "</div>";
  }
}

?>
