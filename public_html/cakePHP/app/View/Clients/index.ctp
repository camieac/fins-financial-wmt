<!-- File: /app/View/clients/index.ctp -->

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
