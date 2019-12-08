<?php

// set connection
$connection = setConnectionInfo(DBCONNSTRING,DBUSER,DBPASS);
/*
  This function returns a connection object to a database
*/
function setConnectionInfo( $connString, $user, $password ) {
    $pdo = new PDO($connString,$user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

/*
  This function runs the specified SQL query using the
  passed connection and the passed array of parameters (null if none)
*/
function runQuery($connection, $sql, $parameters=array())     {
    // Ensure parameters are in an array
    if (!is_array($parameters)) {
        $parameters = array($parameters);
    }

    $statement = null;
    if (count($parameters) > 0) {
        // Use a prepared statement if parameters
        $statement = $connection->prepare($sql);
        $executedOk = $statement->execute($parameters);
        if (! $executedOk) {
            throw new PDOException;
        }
    } else {
        // Execute a normal query
        $statement = $connection->query($sql);
        if (!$statement) {
            throw new PDOException;
        }
    }
    return $statement;
}

// return all companies
function getAllCompanies($connection) {

  try {
    $sql = "SELECT symbol,name,sector,subindustry,address,exchange,website FROM companies";
    $result = runQuery($connection, $sql, null);
    return $result;
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
}

// return single company
function getSingleCompany($connection, $symbol) {

  try {
    $sql = "SELECT symbol,name,sector,subindustry,address,exchange,website FROM companies WHERE symbol=?";
    $statement = runQuery($connection, $sql, array($symbol));
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row;
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
}

// adds a user to database
function insertUser($user, $connection) {

  $errors = validate_user($connection, $user);
  if (!empty($errors)) {
    return $errors;
  }
  
  unset($user[':confirmPassword']);
  $digest = password_hash( $user[':password'], PASSWORD_BCRYPT, ['cost' => 12] );
  $user[':password'] = $digest;

  try {
    $sql = "INSERT into users (firstname, lastname, city, country, email, password)";
    $sql .= " VALUES (:firstName, :lastName, :city, :country, :email, :password);";
    $statement = runQuery($connection, $sql, $user);

    if($statement) {
      return true;
    } else {
      return false;
    }
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
}

// check for unique email address on sign up validation
function has_unique_email($connection, $email)
{
  try {
    $sql = "SELECT email FROM users WHERE email=?";
    $statement = runQuery($connection, $sql, array($email));
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if($row) {
      return false;
    } else {
      return true;
    }
  } catch (PDOException $e) {
    die( $e->getMessage() );
  }

}

// return a single user by email
function get_single_user($email, $connection)
{

  try {
    $sql = "SELECT id, email, password FROM users WHERE email=?";
    $statement = runQuery($connection, $sql, $email);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row;
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
}


/*Used to edit company data and called in edit_company.php file*/
function editCompany($insert)
{
    try{
          $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = $insert;
          $pdo->exec($sql);
        }

   catch (PDOException $e) {
          die( $e->getMessage() );
       }
}

//gets gompanies based on symbols
function get_companies_where($connection, $params=array())
{
  try {
    $params_imploded = implode("','",$params);
    $sql = "SELECT symbol,name FROM companies WHERE symbol IN ('$params_imploded')";
    $result = runQuery($connection, $sql, null);
    return $result;
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
}

// return profile
function get_user_profile($email, $connection) {

  try {
    $sql = "SELECT id, firstname, lastname, city, country, email FROM users WHERE email=?";
    $statement = runQuery($connection, $sql, array($email));
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row;
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
}

//checks if portfolio exists
function check_portfolio($connection, $id, $symbol){
  try {
    $sql = "SELECT symbol, amount FROM portfolio WHERE userId = ? AND symbol = ?";
    $result = runQuery($connection, $sql, array($id, $symbol));
    if($result->rowCount()>0){
      return true;
    }
    else{
      return false;
    }
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
}
//gets specific portfolio that matches userid and symbol
function get_portfolio($connection, $id, $symbol)
{
  try {
    $sql = "SELECT symbol, amount FROM portfolio WHERE userId = ? AND symbol = ?";
    $statement = runQuery($connection, $sql, array($id, $symbol));
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
}
//returns all portfolios that match userid
function get_all_portfolios($connection, $id)
{
  try {
    $sql = "select companies.name, portfolio.symbol, portfolio.amount from portfolio inner join companies on portfolio.symbol = companies.symbol where portfolio.userid = ?";
    $result = runQuery($connection, $sql, array($id));
    return $result;
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
}
//creates porfolio entry
function set_portfolio($connection, $id, $symbol, $amount){
  try {
    $sql = "INSERT INTO portfolio(userId, symbol, amount) VALUES(?, ?, ?)";
    $result = runQuery($connection, $sql, array($id, $symbol, $amount));
    return $result;
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
}
//updates portfolio entry, checks if portfolio needs to be removed
function update_portfolio($connection, $id, $symbol, $amount){
  $result = get_portfolio($connection, $id, $symbol);
  $newAmount = $result['amount'] + $amount;
  if ($newAmount < 1){
    remove_portfolio($connection, $id, $symbol);
  }
  else{
  try {
    $sql = "UPDATE portfolio Set amount = ? WHERE userId = ? AND symbol = ?";
    $result = runQuery($connection, $sql, array($newAmount, $id, $symbol));
    return $result;
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
  }
}
//removes portfolio entry
function remove_portfolio($connection, $id, $symbol){
  try {
    $sql = "DELETE FROM portfolio WHERE userId = ? AND symbol = ?";
    $result = runQuery($connection, $sql, array($id, $symbol));
    return $result;
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
}

?>
