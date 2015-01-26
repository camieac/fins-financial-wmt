<?php


echo $this->Html->link('Clients', array('controller'=>'clients'));
echo '<br/>';
echo $this->Html->link('Meetings', array('controller'=>'meetings'));
echo '<br/>';
echo $this->Html->link('Stocks', array('controller'=>'stocklists'));
echo '<br/>';
echo $this->Html->link('Purchases', array('controller'=>'purchases'));
echo '<br/>'; echo '<br/>';
echo $this->Html->link('Users', array('controller'=>'users', 'action' => 'add'));



?>
