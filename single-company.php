
<!-- Once a company is selected from list.php 
    it directs the user to this page where the 
    companie's info is presented-->


<?php
require_once 'functions/config.inc.php';
require_once 'functions/db-functions.inc.php';
require_once 'functions/auth-functions.php';
require_once 'functions/general-functions.php';
include "includes/header.php";
?>
<?php


//--------------------------------------Inside this if the elements are created and display the proper content for the company selected-------------------------
{
  $symbol=$_GET['symbol'];//get the symbol from submission 
  $row = getSingleCompany($connection, $symbol); //passed into method located in functions/db-functions.inc.php

//----------------------------------------------Contains company image and information-----------------------------------------   
    echo "<div class='content'>";
    display_message($_SESSION['message']);
    echo"<div id = singleCompany>";
    echo  "<img id='complogo' src=../logos/".$symbol.".svg>" ;
    echo   "<div id='symb'>"."Name: ".$row['name']."</div>";
    echo"<div id='website'>"."Website:<br>"."<a href='".$row['website']."'>".$row['website']."</a>"."</div>";
    echo  "<div id='subindustry'>Sub Industry: ".$row['subindustry']."</div>";
    echo  "<div id='sector'>Sector: ".$row['sector']."</div>";
    echo  "<div id='address'> Address: ".$row['address']."</div>";

//----------------------------------------------Buttons to edit, add fav, and see moth stock----------------------------------------   
    echo"<table id=buttonsTable>
     <tr>";
    echo"<td>". "<a href=".'edit_company.php?symbol='.$symbol.">";
    echo"<button type='button'>Edit </button></a></td>";
    echo"<td><a href='favourites.php?symbol=" . $symbol . "'><button type='button'>Add Favorite</button></a></td>";

    echo"<td>". "<a href="."month.php?symbol=".$symbol.">";
    echo"<button type='button'>$ Monthly</button> </td>
       </tr>
   </table>
   </div>";
   
//---------------------------------------------Form to add into portfolio--------------------------------------------------------------------

   echo"<form action='portfolio.php' method='post'> <input type='number' min='1' max'999999999' name='amount' placeholder='Enter Shares'> 
   <input type='hidden' name='symbol' value='$symbol'> <input type='submit' value='Add to Portfolio'> </form>";
   
   echo"</div>";
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------

$connection = null;
unset($_SESSION['message']);
?>

<?php include "includes/footer.php" ?>
