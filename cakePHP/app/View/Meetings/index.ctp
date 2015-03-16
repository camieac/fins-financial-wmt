<!-- File: /app/View/meetings/index.ctp -->

<?php $User = ClassRegistry::init('User'); ?>

<?php $i = 0; ?>

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
<th>Date</th>
<th>Actions</th>
<th>Created</th>
</tr>
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
<p><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></p>
