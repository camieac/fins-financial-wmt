<!-- File: /app/View/clients/index.ctp -->
<!DOCTYPE HTML>

<html>
	<head>
		<title>Add Client</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
		
		<?php echo $this->Html->script('jquery.min'); ?>
		
		<?php echo $this->Html->script('skel.min'); ?>
		
		<?php echo $this->Html->script('skel-layers.min'); ?>
		
		<?php echo $this->Html->script('init'); ?>
		<noscript>
	<?php echo $this->Html->css(array('skel', 'style', 'style-desktop')); ?>
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
								<a href="/cakePHP/Clients"class="current-page-item">Clients</a>
								<a href="/cakePHP/Meetings">Meetings</a>
								<a href="/cakePHP/stocklists" >Stocklists</a>
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
	$('#clients').DataTable({
	"bLengthChange": false
	}
	);
} ); </script>


<h1><font size="6">Clients</font></h1>
<p><?php echo $this->Html->link('Add client', array('action' => 'add')); ?></p>
<table id="clients" class="display" cellspacing="0" width="100%">
<thead>
<tr>
<th>Id</th>
<th>Name</th>
<th>Gender</th>
<th>Date Of Birth</th>
<th>National Insurance Number</th>
<th>Phone Number</th>
<th>Address</th>
<th>Balance</th>
<th>F.A</th>
<th>Actions</th>
<th>Created</th>
</tr>
</thead>
<!-- Here's where we loop through our $clients array, printing out client info -->
<?php foreach ($clients as $client): ?>
<tr>
<td><?php echo $client['Client']['id']; ?></td>
<td>
<?php
echo $this->Html->link(
$client['Client']['name'],
array('action' => 'view', $client['Client']['id'])
);
?>
</td>
<td><?php echo $client['Client']['gender']; ?></td>
<td><?php echo $client['Client']['dateOfBirth']; ?></td>
<td><?php echo $client['Client']['nis']; ?></td>
<td><?php echo $client['Client']['phoneNo']; ?></td>
<td><?php echo $client['Client']['address']; ?></td>
<td><?php echo $client['Client']['balance']; ?></td>
<td><?php echo $client['Client']['fa']; ?></td>
<td>
<?php
echo $this->Html->link(
'Edit', array('action' => 'edit', $client['Client']['id'])
);
?>
<?php
echo '    ';
echo $this->Form->postLink(
'Delete',
array('action' => 'delete', $client['Client']['id']),
array('confirm' => 'Are you sure?')
);
?>
</td>
<td>
<?php echo $client['Client']['created']; ?>
</td>
</tr>
<?php endforeach; ?>
</table>
<p><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></p>

<div class="row">
					<div class="12u">

						<div id="copyright">
							&copy; Untitled. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a>
						</div>

					</div>
				</div>
			</div>
		</div>
</body>
</html>