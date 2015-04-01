<!-- File: /app/View/meetings/index.ctp -->



<html>
	<head>
		<title>Meetings</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
	</head>
	<body>




	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
		<style>
.dRoundedBox {
width:100%;

}
		</style>
<script type="text/javascript"> $(document).ready(function() {
	$('#meetings').DataTable({
	"bLengthChange": false
	}
	);
} ); </script>



<?php
$User = ClassRegistry::init('User');
?>

<?php
$i = 0;
?>



<h2>Meetings</h2>
<div class = "dRoundedBox">
<?php
echo $this->Html->link('Add meeting', 'add', array(
    'class' => 'button'
));
?>
<?php
echo $this->Html->link('View in Calendar', '/full_calendar', array(
    'class' => 'button'
));
?>
</div>
<div class = "dRoundedBox">
<table id="meetings" class="display" cellspacing="0" width="100%">
<thead>
<tr>
<th>Title</th>
<th>Details</th>
<th>Customer</th>
<?php if($isAdmin) echo '<th>F.A</th>';?>
<th>Start Time</th>
<th>End Time</th>
<th>Date</th>
<th>Actions</th>
<th>Created</th>
</tr>

</thead>
<!-- Here's where we loop through our $events array, printing out meeting info -->
<?php
foreach ($events as $event):
?>

<tr>
<td>
<?php
    echo $event['Meeting']['title'];
?>
</td>
<td><?php
    echo $event['Meeting']['details'];
?></td>
<td><?php echo $clients[$i]['Client']['name']; ?></td>

<?php

if ($isAdmin) echo '<td>'.$fas[$i]['User']['username'].'</td>'; ?>

<?php
    $i++;
?> <!-- increments array -->

<td><?php echo date("H:i", strtotime($event['Meeting']['start'])); ?></td>
<td><?php echo date("H:i", strtotime($event['Meeting']['end'])); ?></td>
<td><?php echo date("Y-m-d", strtotime($event['Meeting']['end'])); ?></td>
<td><?php echo $this->Html->link('Edit', array(
        'action' => 'edit',
        $event['Meeting']['id']
    ));

    echo '    ';
    echo $this->Form->postLink('Delete', array(
        'action' => 'delete',
        $event['Meeting']['id']
    ), array(
        'confirm' => 'Are you sure?'
    ));
?>
</td>
<td>

<?php
    echo $event['Meeting']['created'];
?>


</td>
</tr>
<?php
endforeach;
?>
</table>

</div>

