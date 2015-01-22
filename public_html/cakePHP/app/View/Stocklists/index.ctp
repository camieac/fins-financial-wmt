<!-- File: /app/View/Stocklists/index.ctp -->

<?php $User = ClassRegistry::init('User'); ?>

<h1><font size="6">Stocks</font></h1>

<?php
echo $this->Form->create('Stocklist');
echo $this->Form->input('symbol'); ?>
<div class='submit'>
<?php echo $this->Form->submit('Add Stock', array('div'=>false, 'name'=>'add')); 
?>
</div>
<?php echo $this->Form->end()?>


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
<th>Created</th>
</tr>
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
<p><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></p>
