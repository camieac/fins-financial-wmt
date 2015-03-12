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



<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
		
<script type="text/javascript"> $(document).ready(function() {
	$('#meetings').DataTable({
	"bLengthChange": false
	}
	);
} ); </script>


<?php $User = ClassRegistry::init('User'); ?>

<?php $i = 0; ?>


<h1><font size="6">Meetings</font></h1>
<div class = "dRoundedBox">
<p><?php echo $this->Html->link('Add meeting','add',
									array(
									'class' => 'button'
									)); ?></p>
<p><?php echo $this->Html->link('View in Calendar','test',
									array(
									'class' => 'button'
									)); ?></p>
</div>
<div class = "dRoundedBox">
<table id="meetings" class="display" cellspacing="0" width="100%">
<thead>
<tr>
<th>Id</th>
<th>Name</th>
<th>Description</th>
<th>Customer</th>
<th>F.A</th>
<th>Time</th>
<th>Date</th>
<th>Actions</th>
<th>Created</th>
</tr>
</thead>
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
);
?>
<?php
echo '    ';
echo $this->Form->postLink(
'Delete',
array('action' => 'delete', $meeting['Meeting']['id']),
array('confirm' => 'Are you sure?')
);
?>
</td>
<td>
<?php echo $meeting['Meeting']['created']; ?>
</td>
</tr>
<?php endforeach; ?>
</table>
</div>

<p><?php echo $this->Html->link('Logout','logout', array('controller' => 'users', 'class' => 'button')); ?></p>
