<?php

// include required files
require_once '../functions/config.inc.php';
require_once '../functions/db-functions.inc.php';

// will be used to store fetch data
$companies = getAllCompanies($connection);

// define empty array to store all companies. later will output as json data
$data = array();

// check to see if symbol is set
if (isset($_GET['symbol'])) {
    // set data to single company
    $data[] = getSingleCompany($connection, $_GET['symbol']);
    // check to see if the symbol is valid
    if ($data[0] == null) {
        $data = pushCompanies($companies);
    }
} else {
    // set data to all companies
    $data = pushCompanies($companies);
}

// let browser know what type of data will be outputed for cleaner output
header('Content-Type: application/json');
// output data array in json format
echo json_encode($data, JSON_PRETTY_PRINT);

$connection = null;

// return an array of associative arrays to later output json
function pushCompanies($companies) {

    $data = array();

    foreach($companies as $c) {
        $data[] = array(
            "symbol" => $c['symbol'],
            "name" => $c['name'],
            "sector" => $c['sector'],
            "subindustry" => $c['subindustry'],
            "address" => $c['address'],
            "exchange" => $c['exchange'],
            "website" => $c['website']
        );
    }

    return $data;
}


?>
