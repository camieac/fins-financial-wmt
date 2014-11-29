<!-- File: /app/View/clients/index.ctp -->

<?php $User = ClassRegistry::init('User'); ?>

<h1><font size="6">Clients</font></h1>
<p><?php echo $this->Html->link('Add client', array('action' => 'add')); ?></p>
<table>
<tr>
<th>Id</th>
<th>Name</th>
<th>Gender</th>
<th>Date Of Birth</th>
<th>Phone Number</th>
<th>Address</th>
<th>F.A</th>
<th>Actions</th>
<th>Created</th>
</tr>
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
<td><?php echo $client['Client']['phoneNo']; ?></td>
<td><?php echo $client['Client']['address']; ?></td>
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
