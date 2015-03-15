<!-- File: /app/View/Purchase/index.ctp -->

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