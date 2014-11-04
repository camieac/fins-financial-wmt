<?php
//display all errors
error_reporting(E_ALL); 
ini_set('display_errors', 1);

//include database functions
include ("dbfunctions.php");

//start session 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Twitter Followers</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="author" content="Michael Laing & Finlay Reynolds">
	<meta name="keywords" content="fresh, prints, of, bel-air">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" >
	</script>
	<script class="jsbin" src="http://datatables.net/download/build/jquery.dataTables.nightly.js"></script>
	<link href="CSS/styletwitter.css" rel="stylesheet">
	<link rel="icon"  type="image/jpg" href="images/ws.jpg">
</head>
<body>

<h1>Add Twitter Followers</h1>
<p>
Please enter your twitter name here (No @ symbol):
</p>
<hr/>
<form action = "API.php" method = "post" >
<table id = login>
<tr><td>Twitter Name</td>
<td><input type = "text" name = "name" /> </td>
</table>
<p><input type="submit" value="Submit" /></p>
</form>

</body>
</html>




