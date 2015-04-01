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
		<style>
.dRoundedBox {
width:100%;

}
		</style>
<script type="text/javascript"> $(document).ready(function() {
	$('#purchases').DataTable({
	"bLengthChange": false
	}
	);
} ); </script>

<body>
<?php $i = 0;  ?>

<h2>Purchases</h2>
<div class="dRoundedBox">

<table id="purchases" class="display" cellspacing="0" width="100%">
<thead>
<tr>
<th>Type</th>
<th>Stock</th>
<th>Customer</th>
<th>Quantity</th>
<th>Price Bought At</th>
<th>Total Value</th>
<th>Purchase Date</th>
</tr>
</thead>



<?php for($i = 0; $i < $length; $i++){ ?>
<tr>
<td><?php echo $purchases[$i]['type'] ?></td>
<td><?php echo $stocks[$i]['name']; ?></td>
<td><?php echo $clients[$i]['name'] ?></td>
<td><?php echo $purchases[$i]['quantity']; ?></td>

<td><?php echo $purchases[$i]['price']; ?></td>
<?php $value = ($purchases[$i]['quantity'])*($purchases[$i]['price']); ?>
<td><?php echo "£".number_format($value, 2); ?></td>


<td><?php echo $purchases[$i]['created']; ?></td>
</tr>
<?php } ?>

</table>

</div>
