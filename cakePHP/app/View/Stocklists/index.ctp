<!-- File: /app/View/Stocklists/index.ctp -->

<html>
	<head>
		<title>Home</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			echo $this->Html->css('skel');
			echo $this->Html->css('style');
			echo $this->Html->css('style-desktop');
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
							<h1><a href="/cakePHP/" id="logo">Finance Tool</a></h1>
							<nav id="nav">
								<a href="/cakePHP/" >Homepage</a>
								<a href="/cakePHP/Clients">Clients</a>
								<a href="/cakePHP/Meetings">Meetings</a>
								<a href="/cakePHP/stocklists" " class="current-page-item">Stocklists</a>
								<a href="/cakePHP/purchases" >Purchases</a>
							</nav>
						</header>
					
					</div>
				</div>
			</div>
		</div>
						</header>
<?php $User = ClassRegistry::init('User'); ?>

	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
		
<script type="text/javascript"> $(document).ready(function() {
	$('#stocks').DataTable({
	"bLengthChange": false
	}
	);
} ); </script>


<h1><font size="6">Stocks</font></h1>

<?php
echo $this->Form->create('Stocklist');
echo $this->Form->input('symbol'); ?>
<div class='submit'>
<?php echo $this->Form->submit('Add Stock', array('div'=>false, 'name'=>'add')); 
?>
</div>
<?php echo $this->Form->end()?>


<table id="stocks" class="display" cellspacing="0" width="100%">
<thead>
<tr>
<th>Id</th>
<th>Symbol</th>
<th>Name</th>
<th>Change Percentage</th>
<th>Current Value</th>
<th>Open Value</th>
<th>Close Value</th>
<th>High Value</th>
<th>Low Value</th>
<th>Created</th>
</tr>
</thead>
<!-- Here's where we loop through our $stocklists array, printing out stocklist info -->
<?php foreach ($stocklists as $stocklist): ?>
<tr>
<td><?php echo $stocklist['Stocklist']['id']; ?></td>
<td><?php echo $stocklist['Stocklist']['symbol']; ?></td>
<td>
<?php $company = $stocklist['Stocklist']['symbol'];
$result = $this->Stocks->get(array($company));?>
<?php foreach ($result as $stock): ?>
<?php
echo $this->Html->link(str_replace("\"", "", $stock['name']), array('action' => 'view?stock=' . $stocklist['Stocklist']['symbol']));?>
</td>
<td><?php echo str_replace("\"", "", $stock['change']).'%'; ?></td>
<td><?php echo $stock['current'] ?></td>
<td><?php echo $stock['open'] ?></td>
<td><?php echo $stock['close'] ?></td>
<td><?php echo $stock['high'] ?></td>
<td><?php echo $stock['low'] ?></td>
<?php endforeach; ?>
</td>
<td>
<?php echo $stocklist['Stocklist']['created']; ?>
</td>
</tr>
<?php endforeach; ?>
</table>
<p><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></p>