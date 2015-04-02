<!-- File: /app/View/Clients/view.ctp -->

<!DOCTYPE HTML>

<html>
	<head>
		<title>View Client: <?php
echo h($client['Client']['name']);
?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
		
		
		<noscript>
		<?php
echo $this->Html->css('skel');
?>
		<?php
echo $this->Html->css('style');
?>
		<?php
echo $this->Html->css('style-desktop');
?>
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
	</head>
	<body>

<h2><?php
if ($this->Session->read('Auth.User')) {
    echo $client['Client']['name'];
}
?></h2>

	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
		
<script type="text/javascript"> $(document).ready(function() {
	$('#clientstocks').DataTable({
	"bLengthChange": false,
	"scrollY":        "20em",
        "scrollCollapse": true,
        "paging":         false
	}
	
	);
	$('#clientinfo').DataTable({
	"bLengthChange": false,
	"paging": false,
	"searching":false,
	"ordering":false,
	"info":false
	}
	
	);
	$('#twittertable').DataTable({
	"bLengthChange": false,
	"scrollY": "20em",
	"scrollCollapse": true
	}
	
	);
} ); </script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>



<?php
if ($this->Session->read('Auth.User')) {
?>
<div class = "dRoundedBox">
	<h3>Personal Profile</h3>

<?php
    $imageName = ($client['Client']['imageName']);
    //echo $client['Client']['imageName'];
    $imageURL  = 'profile_pictures/' . $imageName;
    //echo $imageURL;
    if (!file_exists('img/' . $imageURL) | !isset($imageName)) {
        $imageURL = 'profile_pictures/default.png';
    }
?>
<div class="dCircularImage" style="background: url(/img/<?php
    echo $imageURL;
?>) no-repeat;background-size: 100px;"><?php
    echo $this->Html->image($imageURL, array(
        'alt' => 'Profile image',
        'width' => '100',
        'class' => 'aProfileImage'
    ));
?></div>





<table class="display" id="clientinfo">
	<thead><tr><th></th><th></th></tr></thead>
	<tbody>
<tr><td>Gender</td><td><?php
    echo $client['Client']['gender'];
?></td></tr>
<tr><td>Date of Birth</td><td><?php
    echo $client['Client']['dateOfBirth'];
?></td></tr>
<tr><td>Email</td><td><?php
    echo $client['Client']['email'];
?></td></tr>
<tr><td>National Insurance Number</td><td><?php
    echo $client['Client']['nis'];
?></td></tr>
<tr><td>Phone Number</td><td><?php
    echo $client['Client']['phoneNo'];
?></td></tr>
<tr><td>Address</td><td><?php
    echo $client['Client']['address'];
?></td></tr>
<tr><td>Balance</td><td><?php
    echo "£" . number_format($client['Client']['balance'], 2);
?></td></tr>
<?php if ($isAdmin) echo '<tr><td>Financial Advisor</td><td>'.$client['Client']['fa'].'</td></tr>';?>
<?php
    if ($twitterExists) {
        echo '<tr><td>Twitter</td><td><a href ="  https://twitter.com/' . $client['Client']['twitter'] . '">' . $client['Client']['twitter'] . '</a></td></tr>';
        
    }
?>
</tbody>
</table>



<br>


Created: <?php
    echo $client['Client']['created'];
?>
<br>
Last Modified: <?php
    echo $client['Client']['modified'];
    echo $this->Html->link('Edit', array(
        'action' => 'edit',
        'controller' => 'clients',
        $client['Client']['id']
    ), array(
        'class' => 'button'
    ));
?>

</div> <!-- for dRoundedBox -->
<div class = "dRoundedBox">
<h3>Transaction History</h3>
<?php
   // $id = $this->params['pass'];
?>

<table id="clientstocks" class="display">
<thead>
<tr>
<th>Type</th>
<th>Symbol</th>
<th>Name</th>
<th>Quantity</th>
<th>Current Value</th>
<th>Total Value</th>
<th>Actions</th>
<th>Created</th>
</tr>
</thead>


<?php
    $total = 0;
	$net = $client['Client']['balance'];
    //debug($clientStocks);
    foreach ($clientStocks as $stock):
        $company = $stock['stocklists']['symbol'];
        ?>
<td><?php
		echo $stock['purchases']['type'];
	?></td><td><?php
		echo $stock['stocklists']['symbol'];
	?></td><td><?php
        	echo str_replace("\"", "", ($stock['stocklists']['name']));
	?></td><td><?php
       	 echo $stock['purchases']['quantity'];
	?></td><?php
        	if (($stock['stocklists']['current']) == 0) {
		?><td><?php
            		echo "£" . number_format($stock['stocklists']['close'], 2);
		?></td><?php
            		$value = ($stock['purchases']['quantity']) * ($stock['stocklists']['close']);
        	}else{
			?><td><?php
            		if (!$stock['stocklists']['current'] == 0) {
                		echo "£" . number_format($stock['stocklists']['current'], 2);
            		}else{
                		echo $stock['stocklists']['current'];
            		}
			?></td><?php
            			$value = ($stock['purchases']['quantity']) * ($stock['stocklists']['current']);
		}
		?><td><?php
        		echo "£" . number_format($value, 2);
		?></td><td><?php
if($stock['purchases']['type'] == 'bought'){
        		echo $this->Form->create('Purchase');
        		echo $this->Form->input('quantity');
        		$test = $stock['purchases']['id'];
        		echo $this->Form->hidden('id', array(
            			'default' => $test
        		));
			echo $this->Form->hidden('type', array(
            			'default' => 'sold'
        		));
        		echo $this->Form->submit('Sell Stock', array(
            			'div' => false,
            			'name' => ('sell'),
            			'class' => 'button buttonTable',
            			array(
                			'rule' => 'notEmpty'
           			)
        		));
        		echo $this->Form->end();
}/*else{
echo $this->Form->create('Purchase');
        		echo $this->Form->input('quantity');
        		$test = $stock['purchases']['id'];

        		echo $this->Form->input('id', array(
				'type' => 'hidden',
            			'default' => $test
        		));
			echo $this->Form->hidden('type', array(
            			'default' => 'bought'
        		));
			echo $this->Form->hidden('stock', array(
            			'default' => $stock['stocklists']['id']
        		));
        		echo $this->Form->submit('Buy Stock', array(
            			'div' => false,
            			'name' => ('buy'),
            			'class' => 'button buttonTable',
            			array(
                			'rule' => 'notEmpty'
           			)
        		));
        		echo $this->Form->end();
}*/
			?></td><td><?php
        			echo $stock['purchases']['created'];
			?> </td></tr><?php
        $total = $total + $value;
	
    endforeach;
$net = $net + $total;
?>
</table>
<font size = "4"><p><b>Total Share value:</b></p></font>
<p><?php
    echo "£" . number_format($total, 2);
?></p>
<font size = "4"><p><b>Net Total:</b></p></font>
<p><?php
    echo "£" . number_format($net, 2);
?></p>
</div>
<div class = "dRoundedBox">
	<h3>New Transaction</h3>



<?php
    echo $this->Form->create('Purchase', array(
        'class' => 'fForm'
    ));
    echo $this->Form->input('stock', array(
        'type' => 'select',
        'options' => $stockoptions
    ));
echo $this->Form->hidden('type', array(
            'default' => 'bought'
        		));
    echo $this->Form->input('customer', array(
        'type' => 'select',
        'options' => $id,
        'default' => $id,
        'type' => 'hidden'
    ));
    echo $this->Form->input('quantity');
?>
<div class='submit'>
<?php
    echo $this->Form->submit('Buy Stock', array(
        'div' => false,
        'name' => 'buy',
        'class' => 'button',
        array(
            'rule' => 'notEmpty'
        )
    ));
?>
</div>
<?php
    echo $this->Form->end();
?>
</div>

<?php //Optional twitter feed here
    if ($twitterExists) {
        $href      = 'https://twitter.com/' . $client['Client']['twitter'];
        
        if ($twitterExists) {
            //echo '<div class="dRoundedBox"><a class="twitter-timeline" href="'.$href.'" data-widget-id="576861420341559296">Tweets by @'.$client['Client']['twitter'].'</a></div>';
            //echo $twitter_timeline;
            $decode = json_decode($twitter_timeline, true); //getting the file content as array
            
            echo '<div class = "dRoundedBox"><h3>Twitter Feed</h3>';
            //foreach($decode as $tweet) {
            //   $tweet_text = $tweet["text"];
            //   echo '<li>';
            //   echo $tweet_text;
            //   echo '</li>';
            //}
            //echo '</ul>';
            
            $reg_exUrl  = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
            $reg_exHash = "/#([a-z_0-9]+)/i";
            $reg_exUser = "/@([a-z_0-9]+)/i";
            
            echo '<table id ="twittertable">';
?>
<thead>
<tr>
<?php
           if($twitterExists) echo '<th>'.$client['Client']['twitter'].'</th>';
?>
</tr>
</thead>
<tbody>

<?php
            foreach ($decode as $tweet) {
                $tweet_text = $tweet["text"]; //get the tweet
                
                // make links link to URL
                // http://css-tricks.com/snippets/php/find-urls-in-text-make-links/
                if (preg_match($reg_exUrl, $tweet_text, $url)) {
                    
                    // make the urls hyper links
                    $tweet_text = preg_replace($reg_exUrl, "<a href='{$url[0]}'>{$url[0]}</a> ", $tweet_text);
                    
                }
                
                if (preg_match($reg_exHash, $tweet_text, $hash)) {
                    
                    // make the hash tags hyper links    https://twitter.com/search?q=%23truth
                    $tweet_text = preg_replace($reg_exHash, "<a href='https://twitter.com/search?q={$hash[0]}'>{$hash[0]}</a> ", $tweet_text);
                    
                    // swap out the # in the URL to make %23
                    $tweet_text = str_replace("/search?q=#", "/search?q=%23", $tweet_text);
                    
                }
                
                if (preg_match($reg_exUser, $tweet_text, $user)) {
                    
                    $tweet_text = preg_replace("/@([a-z_0-9]+)/i", "<a href='http://twitter.com/$1'>$0</a>", $tweet_text);
                    
                }
                
                // display each tweet in a list item
                echo "<tr><td>" . $tweet_text . "</td></tr>";
            }
            echo '</tbody></table></div>';
        }
    } else {
        //echo 'NO TWITTER FOR US';
    }
?>
<?php
} else {
    echo $this->Html->link('Login', array(
        'controller' => 'Users',
        'action' => 'login'
    ));
}
?>
