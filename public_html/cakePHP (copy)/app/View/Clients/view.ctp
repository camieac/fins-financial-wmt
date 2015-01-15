<!-- File: /app/View/Clients/view.ctp -->
<?php if ($this->Session->read('Auth.User')) 
{ ?>
<h1><?php echo h($client['Client']['name']); ?></h1>
<p><small>Created: <?php echo $client['Client']['created']; ?></small><br>
<small>Modified: <?php echo $client['Client']['modified']; ?></small></p>
<p><?php echo 'Gender: ', h($client['Client']['gender']); ?></p> 
<p><?php echo 'Date of Birth: ', h($client['Client']['dateOfBirth']); ?></p> 
<p><?php echo 'Phone Number: ', h($client['Client']['phoneNo']); ?></p>
<p><?php echo 'Address: ', h($client['Client']['address']); ?></p> 
<p><?php echo 'F.A: ', h($client['Client']['FA']); ?></p> 
<?php }
else
{
echo $this->Html->link('Login', array('controller' => 'Users', 'action' => 'login'));
}?>
