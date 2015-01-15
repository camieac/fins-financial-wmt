<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1); 
include ("dbfunctions.php");

session_start();
dbConnect();
dbSelect(); 


$user = $_GET['q'];
$check = "SELECT liked FROM MyTwitter WHERE username = '$user'";
$result = runQuery($check); 
$row = mysql_fetch_array($result);

if($row[0]==0)
{
$query = "UPDATE MyTwitter SET liked = '1' WHERE username = '$user'";
$result = runQuery($query); 
echo "<img src='images/thumbsup.png'/>";
}
else
{
$query = "UPDATE MyTwitter SET liked = '0' WHERE username = '$user'";
$result = runQuery($query); 
echo "<img src='images/faded.png'/>";
}
?>
