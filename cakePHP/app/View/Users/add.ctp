<!-- app/View/Users/add.ctp -->
<h2>Add User</h2>
<div class = "dRoundedBox">
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php 
	echo $this->Form->input('name');
        echo $this->Form->input('username');
	echo $this->Form->input('password');
	if(AuthComponent::user('role') == 'admin'){
        	echo $this->Form->input('role', array(
        	    'options' => array('admin' => 'Admin', 'fa' => 'FA')
        	));
	}else{
		echo $this->Form->input('role', array(
        	    'options' => array('fa' => 'FA')
        	));
	}
    ?>
    </fieldset>
<?php echo $this->Form->end(array('label' =>'Add User','class' =>'button')); ?>
</div>
</div>
