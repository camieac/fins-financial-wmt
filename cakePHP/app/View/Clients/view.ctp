<!-- File: /app/View/Clients/view.ctp -->

<!DOCTYPE HTML>

<html>
	<head>
		<title>View Client</title>
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



	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
		
<script type="text/javascript"> $(document).ready(function() {
	$('#clientstocks').DataTable({
	"bLengthChange": false
	}
	);
} ); </script>

<section>

<?php if ($this->Session->read('Auth.User')) 
{ ?>
<div class = "dRoundedBox">
<table id = "tClientDates" style="width:100%">

<tr>
<b>
<td><strong><?php echo h($client['Client']['name']); ?></strong></td>
</b>
</tr>


<p>
<tr>
<td>Created: </td>
<td> <?php echo $client['Client']['created']; ?></td>
</tr>

<tr>
<td>Modified: </td>
<td><?php echo $client['Client']['modified']; ?></td>
</tr>
</table>
</div> <!-- for dRoundedBox -->

</section>
<div class = "dRoundedBox">
<?php $clientID =  ($client['Client']['id']);
	$imageURL = 'profile_pictures/' . $clientID . '.png';
	echo $imageURL;
	if (!file_exists('img/'.$imageURL)) {
		$imageURL = 'profile_pictures/default.png';
	}?>
<?php echo $this->Html->image($imageURL, array('alt' => 'Profile image','width' => '100','class' => 'aProfileImage')); ?>

<?php echo 'Gender: ', h($client['Client']['gender']); ?>
<?php echo 'Date of Birth: ', h($client['Client']['dateOfBirth']); ?>
<?php echo 'National Insurance Number: ', h($client['Client']['nis']); ?>
<?php echo 'Phone Number: ', h($client['Client']['phoneNo']); ?>
<?php echo 'Address: ', h($client['Client']['address']); ?>
<?php echo 'Balance: ', "£".number_format($client['Client']['balance'], 2); ?>
<?php echo 'F.A: ', h($client['Client']['fa']); ?>
<br/><br/>
</div> <!-- for dRoundedBox -->
<div class = "dRoundedBox">

<?php $id = $this->params['pass']; ?>

<table id="clientstocks" class="display" cellspacing="0" width="100%">
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

<td><?php echo "£".number_format($result[0]['current'], 2); ?></td>
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
<?php }
else
{
echo $this->Html->link('Login', array('controller' => 'Users', 'action' => 'login'));
}?>
