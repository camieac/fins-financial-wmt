<!-- app/View/Users/change_password.ctp -->
<div class = "dRoundedBox">
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php 
		echo $this->Form->create('User');
		echo $this->Form->input('id');
		echo $this->Form->input('current_password',array('type' => 'password', 'label' => 'Old Password'));
		echo $this->Form->input('password1',array('type' => 'password', 'label' => 'New Password'));
		echo $this->Form->input('password2',array('type' => 'password', 'label' => 'Repeat New Password'));

	?>
    </fieldset>
<?php echo $this->Form->end(array('label' => 'Change Password', 'class' => 'button')); ?>
</div>
</div>
