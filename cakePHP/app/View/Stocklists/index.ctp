<!-- File: /app/View/Stocklists/index.ctp -->

<<<<<<< HEAD
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
	<body>

=======
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
<?php $User = ClassRegistry::init('User'); ?>

	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
		
<script type="text/javascript"> $(document).ready(function() {
	$('#stocks').DataTable({
	"bLengthChange": false
	}
	);
<<<<<<< HEAD
	$('#submit-link').click(function(){
  $('#StocklistIndexForm').submit();
});
=======
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
} ); </script>


<h1><font size="6">Stocks</font></h1>
<<<<<<< HEAD
<div class="dRoundedBox">
<?php
echo $this->Form->create('Stocklist', array('class' => 'fForm'));
echo $this->Form->input('symbol'); ?>
<div class='submit'>
<?php // echo $this->Form->submit('Add Stock', array('div'=>false, 'name'=>'add'));
?>
<?php echo $this->Html->link('Add Stock','#', array('id' => 'submit-link','class' => 'button')); ?>

</div>
<?php echo $this->Form->end()?>
</div>
<div class="dRoundedBox">
=======

<?php
echo $this->Form->create('Stocklist');
echo $this->Form->input('symbol'); ?>
<div class='submit'>
<?php echo $this->Form->submit('Add Stock', array('div'=>false, 'name'=>'add')); 
?>
</div>
<?php echo $this->Form->end()?>


>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
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
<<<<<<< HEAD
</div>

=======
<p><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></p>
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
