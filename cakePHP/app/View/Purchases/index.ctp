<!-- File: /app/View/Purchase/index.ctp -->
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
							<h1><a href="/" id="logo">Finance Tool</a></h1>
							<nav id="nav">
								<a href="/" >Homepage</a>
								<a href="/Clients">Clients</a>
								<a href="/Meetings">Meetings</a>
								<a href="/stocklists" >Stocklists</a>
								<a href="/purchases" " class="current-page-item">Purchases</a>
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
	$('#purchases').DataTable({
	"bLengthChange": false
	}
	);
} ); </script>

<?php $i = 0;  ?>

<h1><font size="6">Purchases</font></h1>
<table id="purchases" class="display" cellspacing="0" width="100%">
<thead>
<tr>
<th>Stock</th>
<th>Customer</th>
<th>Quantity</th>
<th>Price Bought At</th>
<th>Total Value</th>
<th>Created</th>
</tr>
</thead>
<?php foreach ($purchases as $purchase): ?>

<?php $result = $this->Stocks->get(array($query[$i]['stocklists']['symbol'])); ?>

<?php foreach ($result as $stock): ?>

<tr>
<td><?php echo str_replace("\"", "", $stock['name']); ?></td>
<td><?php echo str_replace("\"", "", $query[$i]['clients']['name']) ?></td>
<td><?php echo $purchase['Purchase']['quantity']; ?></td>


<?php $i++; ?> <!-- increments array -->

<td><?php echo $purchase['Purchase']['price']; ?></td>
<?php $value = ($purchase['Purchase']['quantity'])*($purchase['Purchase']['price']); ?>
<td><?php echo "£".number_format($value, 2); ?></td>
<?php endforeach; ?>

<td><?php echo $purchase['Purchase']['created']; ?></td>

<?php endforeach; ?>
</tr>
</table>
<p><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></p>