<?php
require_once 'functions/config.inc.php';
require_once 'functions/db-functions.inc.php';
require_once 'functions/general-functions.php';
require_once 'functions/auth-functions.php';
include "includes/header.php";
?>

<?php

require_login(); //makes sure user is logged in 

if (isset($_GET['symbol'])) { //If symbol is specidfied from get request 
    $symbol=$_GET['symbol']; //get symbol
    $row = getSingleCompany($connection, $symbol); //get company info based on symbol using method in functions/db-functions.inc.php . 
    $name=$row['name']; //get name from query
    $sector=$row['sector']; //get sector from query
    $subindustry=$row['subindustry']; //get subindustry from query
    $address=$row['address']; //get address from query
    echo  "<img id='complogo' src=../logos/".$symbol.".svg>" ;// create image of logo 
} 

elseif (isset($_POST['symbol'])) {//If symbol is specidfied in post request
    $symbol=$_POST['symbol'];
    echo  "<img id='complogo' src=../logos/".$symbol.".svg>" ;// create image of logo 
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {//if post request is made with symbol
    $nameCheck=true;
    $sectorCheck=true;
    $subIndustryCheck=true;
    $addressCheck=true;
    $allBlank=false;

    if (is_blank($_POST['name'])) {//check if blank
        $nameCheck=false;
    }

    if (is_blank($_POST['sector'])) {//check if blank
        $sectorCheck=false;
    }
    if (is_blank($_POST['subIndustry'])) {//check if blank
        $subIndustryCheck=false;
    }
    if (is_blank($_POST['address'])) {//check if blank
        $addressCheck=false;
    }


    if ($nameCheck==false && $sectorCheck==false &&  $subIndustryCheck==false && $addressCheck==false) {// if all fields are blank 
        $allBlank=true;
    }


    if ($allBlank==false) { //if not all fields are blank 
        
        if ($nameCheck==true) { //if name update is found run query if database  
            $sql = "UPDATE companies SET name="."'".$_POST['name']."'"."WHERE symbol="."'".$symbol."'";
            editCompany($sql);
            $name=$_POST['name'];
        }


        if ($sectorCheck==true) {// if sector update is found run query if database  
            $sql = "UPDATE companies SET sector="."'".$_POST['sector']."'"."WHERE symbol="."'".$symbol."'";
            editCompany($sql);
            $sector=$_POST['sector'];
        }


        if ($subIndustryCheck ==true) {//if  subindustry update is found run query if database
            $sql = "UPDATE companies SET subindustry="."'".$_POST['subIndustry']."'"."WHERE symbol="."'".$symbol."'";
            editCompany($sql);
            $subindustry=$_POST['subIndustry'];
        }

        if ($addressCheck ==true) {//if  address update is found run query if database
            $sql = "UPDATE companies SET  address="."'".$_POST['address']."'"."WHERE symbol="."'".$symbol."'";
            editCompany($sql);
            $address=$_POST['address'];
        }
    }

    $_SESSION['message'] = "The update has been sucessful for " . $symbol;
    redirect_to("single-company.php?symbol=$symbol");//when all processes are done redirect to single company page
}

?>

<!----------------------------------------------------Form to Make company edits---------------------------------------------------------->
<div class="content">
  <div id="editContainer">
    <form id='editCompany' action=<?php echo "'edit_company.php?symbol=".$symbol."'";?> method="POST">
        Name:</br>
        <input type="text" name="name" value=<?php echo "'".$name."'";?>></br>
        Sector:</br>
        <input type="text" name="sector" value=<?php echo "'".$sector."'";?> ></br>
        Sub Industry:</br>
        <input type="text" name="subIndustry" value=<?php echo "'".$subindustry."'";?>></br>
        Address:</br>
        <input type="text" name="address" value=<?php echo "'".$address."'";?>> </br>

        <input type="submit" value="Save">
    </form>
    <a href=<?php echo "'single-company.php?symbol=".$symbol."'";?>><button type="button">Cancel</button></a>
</div>
</div>


<?php 
$connection = null;
include "includes/footer.php" 
?>
