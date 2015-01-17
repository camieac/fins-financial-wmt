<!-- File: /app/View/Stocklist/view.ctp -->
<h1>Add Stock</h1>
<?php
echo $this->Form->create('Stocklist');
echo $this->Form->input('symbol');
echo $this->Form->input('name');
echo $this->Form->end('Save stock');
?>
