<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1); 
session_start();
include ("dbfunctions.php");
//print first part of html
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Twitter</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="author" content="Michael Laing & Finlay Reynolds">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> 
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" >
	</script>
	<script class="jsbin" src="http://datatables.net/download/build/jquery.dataTables.nightly.js"></script>
	<link href="CSS/styletwitter.css" rel="stylesheet">
</head>
<body>

<?php


//$user = $_SESSION['user'];
//$pass = $_SESSION['pass'];

//connect to database
dbConnect();
dbSelect();


$id = $_POST["id"];
$username = $_POST["username"];
$display = $_POST["display"];
$location = $_POST["location"];
$description = $_POST["description"];
$followers = $_POST["followers"];
$following = $_POST["following"];
$tweets = $_POST["tweets"];



$query = "INSERT INTO MyTwitter VALUES ('$id', '$username', '$display', '0', '$location', '$description', '$followers', '$following', '$tweets' )";


$insResult = mysql_query($query);
if ($insResult)
{
   print("Follower details for " . $username . " have been inserted<br/>");
}
else
  	  exit ( mysql_error());   //vital to know why it failed


?>

<p><a href = "table.php" >Check table of followers.</a></p>



