<?php

include ("dbfunctions.php");


dbConnect();
dbSelect();

require_once('TwitterAPIExchange.php');


/** Set access tokens **/
$settings = array('oauth_access_token' => "2155522208-fOJx3vflSnt3hBYYpntBWYJ4314s6QbEO8rsiY3",
                          'oauth_access_token_secret' => 
                           "iEqpsvYO5SBVDGdNcdYS11Bam6pXyNPIkLXGiDVhmX3Th",
                          'consumer_key' => "tlY4e24Dlz3VRxfSrBKiig",
                          'consumer_secret' => "acsTqgpjSkD6cEtighaeWoxaVwQSlkBJD0sOG7Lnns");



$escname = mysql_real_escape_string($_POST["name"]);
$named = strip_tags($escname);


$url = 'https://api.twitter.com/1.1/followers/list.json';
$getfield = '?screen_name='.$named.'&skip_status=1&count=200';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$twitterOutput =  $twitter->setGetfield($getfield)  
                                     ->buildOauth($url, $requestMethod) 
                                     ->performRequest(); 


// Perform subsequent GET requests and store data
$page = 0;      $data = array();
$array = json_decode($twitterOutput,true);
$page = paginateFollowers($array);
while ($page!=0) {   
    $getpage = $getfield.'&cursor='.$page;  
    $twitterOutput =  $twitter->setGetfield($getpage)  
                                         ->buildOauth($url, $requestMethod) 
                                         ->performRequest(); 
    $array = json_decode($twitterOutput,true);
   
	 
    $page = paginateFollowers($array);
}


function paginateFollowers($array) {  
    global $data;  
    foreach($array["users"] as $user) {
        $data[] = array("userid" => $user["id_str"],
                                "username" => $user["screen_name"],
                                "name" => $user["name"],
                                "description" => $user["description"],
                                "tweets" => $user["statuses_count"],
                                "following" => $user["friends_count"],
                                "image" => $user["profile_image_url"],
                                "followers" => $user["followers_count"],
                                "location" => $user["location"] );

		$id = strip_tags(mysql_real_escape_string($user['id_str']));
		$username = strip_tags(mysql_real_escape_string($user['screen_name']));
		$name = strip_tags(mysql_real_escape_string($user['name']));
		$location = strip_tags(mysql_real_escape_string($user['location']));
		$description = strip_tags(mysql_real_escape_string($user['description']));
		$followers = strip_tags(mysql_real_escape_string($user['followers_count']));
		$following = strip_tags(mysql_real_escape_string($user['friends_count']));
		$tweets = strip_tags(mysql_real_escape_string($user['statuses_count']));

$result = mysql_query("SELECT iD FROM MyTwitter WHERE iD = '{$user['id_str']}'");
$row = mysql_fetch_array($result);
        
		if($row==null)
		{
			$insert = "INSERT INTO MyTwitter VALUES ('$id','$username','$name', 0, '$location','$description','$followers','$following','$tweets')";
			$results = mysql_query($insert) or die(mysql_error());
		}
    }
	
    return $array["next_cursor"];
}

 header("Location: table.php");

?>
