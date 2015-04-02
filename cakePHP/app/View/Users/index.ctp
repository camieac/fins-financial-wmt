<!-- app/View/Users/index.ctp -->
<title>User Settings</title><h1>
<font size="6">User Settings: <?php echo AuthComponent::user('name') ?></font></h1>
<div class = "dRoundedBox">
	<?php if($isAdmin){ echo '<p> You are an administrator.</p>';}
	else {echo '<p> You are a financial advisor.</p>';} ?>
<ul>
<li><?php if($isAdmin) echo $this->Html->link('Add User', 'add', array('class' => 'button')); ?></li>
<li><?php echo $this->Html->link('Change Password', 'change_password', array('class' => 'button')); ?></li>
<li><?php echo $this->Html->link('Home Settings', 'home_settings', array('class' => 'button')); ?></li>
</ul>
</div>
