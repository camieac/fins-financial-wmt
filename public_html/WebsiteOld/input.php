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

<p><a href = "table.php">Show Followers Table</a></p>

<form name = "inputform" onsubmit="return validateForm()" method="post" action="add.php">
<table>
<tr> <td>ID</td>
 <td> <input type="number" size="20" name="id"/> </td> </tr>
<tr> <td>Username</td>
 <td> <input type="text" size="20" name="username"/> </td> </tr>
 <tr> <td>Display Name</td>
<td> <input type="text" size="20" name="display"/> </td> </tr>
<tr> <td>Location</td>
<td> <input type="text" size="50" name="location"/> </td> </tr>
<tr> <td>Description </td>
<td> <input type="text" size="50" name="description"/> </td> </tr>
<tr> <td>Number Of Followers</td>
<td> <input type="number" size="10" value="0" name="followers"/> </td> </tr>
<tr> <td>Number Of Following </td>
<td> <input type="number" size="10" value="0" name="following"/> </td> </tr>
<tr> <td>Number Of Tweets</td>
<td> <input type="number" size="10" value="0" name="tweets"/> </td> </tr></tr>

<script>

function validateForm()
{
var x=document.forms["inputform"]["id"].value;
if (x==null || x=="" || x<0 || isNaN(x))
  {
  alert("Please enter a valid ID.");
  return false;
  }

x=document.forms["inputform"]["username"].value;
if (x==null || x=="")
  {
  alert("Please enter a valid username.");
  return false;
  }

x=document.forms["inputform"]["display"].value;
if (x==null || x=="")
  {
  alert('Please enter a valid display name.');
  return false;
  }

x=document.forms["inputform"]["followers"].value;

if (x==null || x=="" || x<0 || isNaN(x))
  {
  alert("Number of Followers must be filled out properly.");
  return false;
  }

x=document.forms["inputform"]["following"].value;

if (x==null || x=="" || x<0 || isNaN(x))
  {
  alert("Number of Following must be filled out properly.");
  return false;
  }

x=document.forms["inputform"]["tweets"].value;
if (x==null || x=="" || x<0 || isNaN(x))
  {
  alert("Number of Tweets must be filled out properly.");
  return false;
  }
}
</script>


</table>

<input type="submit" value="Submit"/>
</form>


</body>
</html>
