<!-- File: /app/View/Stocklists/index.ctp -->

<?php $User = ClassRegistry::init('User'); ?>

<h1><font size="6">Stocks</font></h1>
<p><?php echo $this->Html->link('Add stock', array('action' => 'add')); ?></p>
<table>
<tr>
<th>Id</th>
<th>Symbol</th>
<th>Name</th>
<th>Change Percentage</th>
<th>Open Value</th>
<th>Close Value</th>
<th>High Value</th>
<th>Low Value</th>
<th>Actions</th>
<th>Created</th>
</tr>
<!-- Here's where we loop through our $stocklists array, printing out stocklist info -->
<?php foreach ($stocklists as $stocklist): ?>
<tr>
<td><?php echo $stocklist['Stocklist']['id']; ?></td>
<td><?php echo $stocklist['Stocklist']['symbol']; ?></td>
<td>
<?php
echo $this->Html->link($stocklist['Stocklist']['name'], array('action' => 'view?stock=' . $stocklist['Stocklist']['symbol']));?>
</td>
<?php $company = $stocklist['Stocklist']['symbol'];
$result = $this->Stocks->get(array($company));?>
<?php foreach ($result as $stock): ?>
<td><?php echo $stock['change'] ?></td>
<td><?php echo $stock['open'] ?></td>
<td><?php echo $stock['close'] ?></td>
<td><?php echo $stock['high'] ?></td>
<td><?php echo $stock['low'] ?></td>
<?php endforeach; ?>
</td>
<td>
<?php
echo '    ';
echo $this->Form->postLink(
'Delete',
array('action' => 'delete', $stocklist['Stocklist']['id']),
array('confirm' => 'Are you sure?')
);
?>
</td>
<td>
<?php echo $stocklist['Stocklist']['created']; ?>
</td>
</tr>
<?php endforeach; ?>
</table>
<p><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></p>
