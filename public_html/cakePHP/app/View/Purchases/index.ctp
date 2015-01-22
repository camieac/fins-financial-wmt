<!-- File: /app/View/Purchase/index.ctp -->

<?php $i = 0;  ?>

<h1><font size="6">Purchases</font></h1>
<table>
<tr>
<th>Stock</th>
<th>Customer</th>
<th>Quantity</th>
<th>Single Value</th>
<th>Total Value</th>
<th>Created</th>
</tr>
<?php foreach ($purchases as $purchase): ?>

<?php $result = $this->Stocks->get(array($query[$i]['stocklists']['symbol'])); ?>

<?php foreach ($result as $stock): ?>

<tr>
<td><?php echo str_replace("\"", "", $stock['name']); ?></td>
<td><?php echo str_replace("\"", "", $query[$i]['clients']['name']) ?></td>
<td><?php echo $purchase['Purchase']['quantity']; ?></td>


<?php $i++; ?> <!-- increments array -->

<?php if(($stock['open']) === 'N/A')
{ ?>
<td><?php echo "£".number_format($stock['close'], 2); ?></td>
<?php }
else {?>
<td><?php echo "£".number_format($stock['open'], 2); ?></td>
<?php } ?>
<?php $value = ($purchase['Purchase']['quantity'])*($stock['open']); ?>
<td><?php echo "£".number_format($value, 2); ?></td>
<?php endforeach; ?>

<td><?php echo $purchase['Purchase']['created']; ?></td>

<?php endforeach; ?>
</tr>
</table>
<p><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></p>
