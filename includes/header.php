<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Assignment 2</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
    <header>
        <div id="head">
          <div id="logo"><h1><a href="index.php">Assignment 2</a></h1></div>
          <i class="fa fa-bars fa-2x" id="menu_icon"></i>
        </div>
        <nav id="main_nav">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="list.php">Companies</a>
            <?php if(!is_logged_in()) { ?>
              <a href="login.php">Login</a>
              <a href="signup.php">Sign Up</a>
            <?php }
            if (is_logged_in()) { ?>
              <a href="profile.php">Profile</a>
              <a href="favourites.php">Favourites</a>
              <a href="portfolio.php">Portfolio</a>
              <a href="logout.php">Logout</a>
            <?php } ?>
        </nav>
    </header>
