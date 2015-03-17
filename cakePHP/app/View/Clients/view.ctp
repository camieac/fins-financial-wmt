<!-- File: /app/View/Clients/view.ctp -->

<!DOCTYPE HTML>

<html>
	<head>
		<title>View Client: <?php echo h($client['Client']['name']); ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
		
		
		<noscript>
		<?php echo $this->Html->css('skel'); ?>
		<?php echo $this->Html->css('style'); ?>
		<?php echo $this->Html->css('style-desktop'); ?>
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
	</head>
	<body>

<h2><?php if ($this->Session->read('Auth.User')){echo $client['Client']['name'];} ?></h2>

	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
		
<script type="text/javascript"> $(document).ready(function() {
	$('#clientstocks').DataTable({
	"bLengthChange": false
	}
	
	);
	$('#clientinfo').DataTable({
	"bLengthChange": false
	}
	
	);
} ); </script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>



<?php if ($this->Session->read('Auth.User')) 
{ ?>
<div class = "dRoundedBox">
	

<?php $clientNIS =  ($client['Client']['nis']);
echo $client['Client']['imageName'];
	$imageURL = 'profile_pictures/' . $clientNIS . '.jpg';
	//echo $imageURL;
	if (!file_exists('img/'.$imageURL)) {
		$imageURL = 'profile_pictures/default.png';
	}?>
<div class="dCircularImage" style="background: url(/img/<?php echo $imageURL ?>) no-repeat;background-size: 100px;"><?php echo $this->Html->image($imageURL, array('alt' => 'Profile image','width' => '100','class' => 'aProfileImage')); ?></div>





<table class="display" id="clientinfo">
<tr><td>Gender</td><td><?php echo $client['Client']['gender']; ?></td></tr>
<tr><td>Date of Birth</td><td><?php echo $client['Client']['dateOfBirth']; ?></td></tr>
<tr><td>National Insurance Number</td><td><?php echo $client['Client']['nis']; ?></td></tr>
<tr><td>Phone Number</td><td><?php echo $client['Client']['phoneNo']; ?></td></tr>
<tr><td>Address</td><td><?php echo $client['Client']['address']; ?></td></tr>
<tr><td>Balance</td><td><?php echo "£".number_format($client['Client']['balance'], 2); ?></td></tr>
<tr><td>Financial Advisor</td><td><?php echo $client['Client']['fa']; ?></td></tr>
</table>



<br>


Created: <?php echo $client['Client']['created']; ?>
<br>
Last Modified: <?php echo $client['Client']['modified']; ?>

</div> <!-- for dRoundedBox -->
<div class = "dRoundedBox">

<?php $id = $this->params['pass']; ?>

<table id="clientstocks" class="display">
<thead>
<tr>
<th>Symbol</th>
<th>Name</th>
<th>Change Percentage</th>
<th>Quantity</th>
<th>Current Value</th>
<th>Total Value</th>
<th>Actions</th>
<th>Created</th>
</tr>
</thead>


<?php 
$total = 0;
foreach ($query as $stock): ?>

<?php
$company = $stock['stocklists']['symbol'];
$result = $this->Stocks->get(array($company));  ?>

<td><?php echo $stock['stocklists']['symbol']; ?></td>
<td><?php echo str_replace("\"", "",($result[0]['name'])) ?></td>
<td><?php echo str_replace("\"", "",($result[0]['change'])) . "%" ?></td>
<td><?php echo $stock['purchases']['quantity']; ?></td>

<?php if(($result[0]['current']) === '0.00')
{ ?>


<td><?php echo "£".number_format($result[0]['close'], 2); ?></td>
<?php $value = ($stock['purchases']['quantity'])*($result[0]['close']); ?>
<?php }
else {?>

<td><?php if(!$result[0]['current'] == 'N/A'){ echo "£".number_format($result[0]['current'], 2); }else{echo $result[0]['current'];}?></td>
<?php $value = ($stock['purchases']['quantity'])*($result[0]['current']); ?>
<?php } ?>

<td><?php echo "£".number_format($value, 2); ?></td>
<td><?php echo $this->Form->postLink('Sell', array('action' => 'deleteStock'.'/'. $stock['purchases']['id'] . '/'. $id[0]),array('confirm' => 'Are you sure?')); ?></td>
<td><?php echo $stock['purchases']['created']; ?></td>
</tr>

<?$total = $total + $value; ?>

<?php endforeach; ?>
</table>
</div>
<div class = "dRoundedBox">
<font size = "4"><p><b>Total:</b></p></font>
<p><?php echo "£".number_format($total, 2); ?></p>

<?php 
$query = Set::flatten($listofstocks); 
for ($j = 0; $j < count($query)/2; ++$j) 
 {
        $stockoptions[$query[$j.'.stocklists.id']] = $query[$j.'.stocklists.symbol'];
 } 
?>
<?php
echo $this->Form->create('Purchase', array('class' => 'fForm'));
echo $this->Form->input('stock',array('type'=>'select','options'=>$stockoptions)); 
echo $this->Form->input('customer',array('type'=>'select','options'=>$id, 'default'=>$id, 'type' => 'hidden')); 
echo $this->Form->input('quantity'); ?>
<div class='submit'>
<?php echo $this->Form->submit('Buy Stock', array('div'=>false, 'name'=>'buy', array('rule' => 'notEmpty'))); ?>
</div>
<?php echo $this->Form->end()?>
</div>
<?php //Optional twitter feed here
if(isset($client['Client']['twitter'])){
	$href = 'https://twitter.com/'.$client['Client']['twitter'];
	$validUser = $this->requestAction(array('controller' => 'clients', 'action' => 'twitterAccountExists','pass' => array($client['Client']['twitter'] )));
	
	if($validUser){
	echo '<div class="dRoundedBox"><a class="twitter-timeline" href="'.$href.'" data-widget-id="576861420341559296">Tweets by @'.$client['Client']['twitter'].'</a></div>';
}
}else{
	echo 'NO TWITTER FOR US';
} ?>
<?php }
else
{
echo $this->Html->link('Login', array('controller' => 'Users', 'action' => 'login'));
}?>
