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

<script>
function click(liked)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.onreadystatechange=
function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("like"+liked).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","like.php?q="+liked,true);
xmlhttp.send();
}


$(document).ready(function() 
{
    $('#foltable').dataTable(
	{
	"bLengthChange": false,
	"iDisplayLength": 100,
  	 "oLanguage": {
            "oPaginate": {
                "sPrevious": "Previous&nbsp", 
                "sNext": "Next", 
            }
        }
    } );
} );
</script>

<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1); 
include ("dbfunctions.php");

session_start();
dbConnect();
 
//select your own database 
dbSelect(); 
$query = "SELECT * FROM MyTwitter";
?>

<h1>Followers Table</h1>
<p><a href = "input.php" >Input information about a follower manually.</a>
<br/><br/>
<a href = "login.php" >Enter Twitter username to get followers.</a></p>

         <table cellpadding="10" cellspacing="5" border="0" class="display" id="foltable">
        <thead>
          <tr>
            <th>id</th>
            <th>Username</th>
	    <th>Display Name</th>
	    <th>Liked</th>
 	    <th>Location</th>
	    <th>Description</th>
	    <th>Number of Followers</th>
	    <th>Number of Following</th>
	    <th>Number of Tweets</th>
          </tr>
        </thead>
        <tbody>


	<?php
	$query = "SELECT * FROM MyTwitter";
	$result = runQuery($query); 
	while($row = mysql_fetch_array($result))
	{
	$id = $row['iD']; 
	$username = $row['username'];
	$displayName = $row['displayName'];
	$liked = $row['liked'];
	$location = $row['location'];
	$description = $row['description'];
	$noOfFollowers = $row['numberOfFollowers'];
	$noOfFollowing = $row['numberOfFollowing'];
	$noOfTweets = $row['numberOfTweets'];

	if($row['liked']>0)
	{
		$liked = "<img src='images/thumbsup.png'/>";
	}
	else
	{
		$liked = "<img src='images/faded.png'/>";
	}
	
	echo '<tr>';
	echo '<td>' . $id . '</td>';
	echo '<td>' . $username . '</td>';
	echo '<td>' . $displayName . '</td>';
	echo "<td><a href='javascript:click(\"{$row['username']}\");'><p id='like{$row['username']}'>{$liked}</td>";
	echo '<td>' . $location . '</td>';
	echo '<td>' . $description . '</td>';
	echo '<td>' . $noOfFollowers . '</td>';
	echo '<td>' . $noOfFollowing . '</td>';
	echo '<td>' . $noOfTweets . '</td>';
	echo '</tr>';
	} ?>

    </tbody>
</table>


</body>
</html>




