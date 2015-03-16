<!-- File: /app/View/meetings/index.ctp -->

<<<<<<< HEAD

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



<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
		
<script type="text/javascript"> $(document).ready(function() {
	$('#meetings').DataTable({
	"bLengthChange": false
	}
	);
} ); </script>


=======
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
<?php $User = ClassRegistry::init('User'); ?>

<?php $i = 0; ?>

<<<<<<< HEAD

<h1><font size="6">Meetings</font></h1>
<div class = "dRoundedBox">
<?php echo $this->Html->link('Add meeting','add',
									array(
									'class' => 'button'
									)); ?>
<?php echo $this->Html->link('View in Calendar','/full_calendar',
									array(
									'class' => 'button'
									)); ?>
</div>
<div class = "dRoundedBox">
<table id="meetings" class="display" cellspacing="0" width="100%">
<thead>
<tr>
<th>Id</th>
<th>Title</th>
<th>Details</th>
<th>Customer</th>
<th>F.A</th>
<th>Start Time</th>
<th>End Time</th>
=======
<h1><font size="6">Meetings</font></h1>
<p><?php echo $this->Html->link('Add meeting', array('action' => 'add')); ?></p>
<table>
<tr>
<th>Id</th>
<th>Name</th>
<th>Description</th>
<th>Customer</th>
<th>F.A</th>
<th>Time</th>
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
<th>Date</th>
<th>Actions</th>
<th>Created</th>
</tr>
<<<<<<< HEAD
</thead>
<!-- Here's where we loop through our $events array, printing out meeting info -->
<?php foreach ($events as $event): ?>

<tr>
<td><?php echo $event['Meeting']['id']; ?></td>
<td>
<?php echo $event['Meeting']['title'];?>
</td>
<td><?php echo $event['Meeting']['details']; ?></td>
<td><?php if(isset($query[$i]['clients']['name'])) {echo str_replace("\"", "", $query[$i]['clients']['name']);}else{echo 'Deleted Client';} ?></td>
<td><?php if(isset($query[$i]['fas']['name'])){echo str_replace("\"", "", $query[$i]['fas']['name']);}else{echo 'Deleted FA';} ?></td>

<?php $i++; ?> <!-- increments array -->

<td><?php echo date("H:i", strtotime($event['Meeting']['start'])); ?></td>
<td><?php echo date("H:i", strtotime($event['Meeting']['end'])); ?></td>
<td><?php echo date("Y-m-d",strtotime($event['Meeting']['end'])); ?></td>
<td>
<?php
echo $this->Html->link(
'Edit', array('action' => 'edit', $event['Meeting']['id'])
=======
<!-- Here's where we loop through our $meetings array, printing out meeting info -->
<?php foreach ($meetings as $meeting): ?>

<tr>
<td><?php echo $meeting['Meeting']['id']; ?></td>
<td>
<?php echo $meeting['Meeting']['name'];?>
</td>
<td><?php echo $meeting['Meeting']['description']; ?></td>
<td><?php echo str_replace("\"", "", $query[$i]['clients']['name']); ?></td>
<td><?php echo str_replace("\"", "", $query[$i]['fas']['name']); ?></td>

<?php $i++; ?> <!-- increments array -->

<td><?php echo date("H:i", strtotime($meeting['Meeting']['meetingTime'])); ?></td>
<td><?php echo $meeting['Meeting']['dateMeeting']; ?></td>
<td>
<?php
echo $this->Html->link(
'Edit', array('action' => 'edit', $meeting['Meeting']['id'])
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
);
?>
<?php
echo '    ';
echo $this->Form->postLink(
'Delete',
<<<<<<< HEAD
array('action' => 'delete', $event['Meeting']['id']),
=======
array('action' => 'delete', $meeting['Meeting']['id']),
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
array('confirm' => 'Are you sure?')
);
?>
</td>
<td>
<<<<<<< HEAD
<?php echo $event['Meeting']['created']; ?>
=======
<?php echo $meeting['Meeting']['created']; ?>
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
</td>
</tr>
<?php endforeach; ?>
</table>
<<<<<<< HEAD
</div>

=======
<p><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></p>
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
