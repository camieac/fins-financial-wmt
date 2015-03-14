<!-- File: /app/View/Purchase/index.ctp -->
<!DOCTYPE HTML>
<html>
	<head>
		<title>Home</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
		
		
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
	</head>
	


	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
		
<script type="text/javascript"> $(document).ready(function() {
	$('#purchases').DataTable({
	"bLengthChange": false
	}
	);
} ); </script>
<body>
<?php $i = 0;  ?>

<h1><font size="6">Purchases</font></h1>
<div class="dRoundedBox">
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
<?php foreach ($purchases as $purchase):
if(isset($query[$i]['stocklists']['symbol'])){
$result = $this->Stocks->get(array($query[$i]['stocklists']['symbol'])); 
}?>

<?php foreach ($result as $stock): ?>

<tr>
<td><?php echo str_replace("\"", "", $stock['name']); ?></td>
<td><?php if (isset($query[$i]['clients']['name'])){echo str_replace("\"", "", $query[$i]['clients']['name']) ;}else{echo 'Deleted Client';}?></td>
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
</div>
<p><?php echo $this->Html->link('Logout','/users/logout', array('class' => 'button','controller' => 'users', 'action' => 'logout')); ?></p>
