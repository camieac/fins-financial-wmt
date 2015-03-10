<!-- File: /app/View/Clients/view.ctp -->

<!DOCTYPE HTML>

<html>
	<head>
		<title>View Client</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
		
		<?php echo $this->Html->script('jquery.min'); ?>
		
		<?php echo $this->Html->script('skel.min'); ?>
		
		<?php echo $this->Html->script('skel-layers.min'); ?>
		
		<?php echo $this->Html->script('init'); ?>
		<noscript>
		<?php echo $this->Html->css('skel'); ?>
		<?php echo $this->Html->css('style'); ?>
		<?php echo $this->Html->css('style-desktop'); ?>
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
	</head>
	<body>

<div id="header-wrapper">
			<div class="container">
				<div class="row">
					<div class="12u">
						
						<header id="header">
							<h1><a href="/" id="logo">Finance Tool</a></h1>
							<nav id="nav">
								<a href="/" >Homepage</a>
								<a href="/Clients"class="current-page-item">Clients</a>
								<a href="/Meetings">Meetings</a>
								<a href="/stocklists" >Stocklists</a>
								<a href="/purchases" >Purchases</a>
							</nav>
						</header>
					
					</div>
				</div>
			</div>
		</div>
						</header>

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
<table style="width:100%">

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

</section>
<p><?php echo 'Gender: ', h($client['Client']['gender']); ?></p> 
<p><?php echo 'Date of Birth: ', h($client['Client']['dateOfBirth']); ?></p> 
<p><?php echo 'National Insurance Number: ', h($client['Client']['nis']); ?></p> 
<p><?php echo 'Phone Number: ', h($client['Client']['phoneNo']); ?></p>
<p><?php echo 'Address: ', h($client['Client']['address']); ?></p> 
<p><?php echo 'Balance: ', "£".number_format($client['Client']['balance'], 2); ?></p> 
<p><?php echo 'F.A: ', h($client['Client']['fa']); ?></p> 
<br/><br/>
<font size = "4"><p><b>Stocks:</b></p></font>

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
echo $this->Form->create('Purchase');
echo $this->Form->input('stock',array('type'=>'select','options'=>$stockoptions)); 
echo $this->Form->input('customer',array('type'=>'select','options'=>$id, 'default'=>$id, 'type' => 'hidden')); 
echo $this->Form->input('quantity'); ?>
<div class='submit'>
<?php echo $this->Form->submit('Buy Stock', array('div'=>false, 'name'=>'buy', array('rule' => 'notEmpty'))); ?>
</div>
<?php echo $this->Form->end()?>

<?php }
else
{
echo $this->Html->link('Login', array('controller' => 'Users', 'action' => 'login'));
}?>