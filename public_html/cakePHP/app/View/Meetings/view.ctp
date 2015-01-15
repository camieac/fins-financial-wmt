<!-- File: /app/View/Meetings/view.ctp -->
<?php if ($this->Session->read('Auth.User')) 
{ ?>
<h1><?php echo h($meeting['Meeting']['name']); ?></h1>
<p><small>Created: <?php echo $meeting['Meeting']['created']; ?></small><br>
<small>Modified: <?php echo $meeting['Meeting']['modified']; ?></small></p>
<p><?php echo 'Description: ', h($meeting['Meeting']['description']); ?></p> 
<p><?php echo 'Date of Birth: ', h($meeting['Meeting']['dateMeeting']); ?></p> 
<?php }
else
{
echo $this->Html->link('Login', array('controller' => 'Users', 'action' => 'login'));
}?>
