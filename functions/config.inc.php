<?php
define('DBHOST', 'localhost');
define('DBNAME', 'assignment_2_db');
define('DBUSER', 'admin');
define('DBPASS', '@ssignment2');
define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8mb4;");



// db information for heroku

// $url = getenv('JAWSDB_URL');
// $dbparts = parse_url($url);

// define('DBHOST', 'localhost');
// define('DBNAME', 'assignment_2_db');
// define('DBUSER', $dbparts['user']);
// define('DBPASS', $dbparts['pass']);
// define('DBCONNSTRING',"mysql:host=" . $dbparts['host'] . ";dbname=" . ltrim($dbparts['path'],'/') . ";charset=utf8mb4;");
?>