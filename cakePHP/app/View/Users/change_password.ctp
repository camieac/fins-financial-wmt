<!-- app/View/Users/edit.ctp -->

<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php 
		echo $this->Form->create('User');
		echo $this->Form->input('id');
		echo $this->Form->input('current_password',array('type' => 'password'));
		echo $this->Form->input('password1',array('type' => 'password'));
		echo $this->Form->input('password2',array('type' => 'password'));

	?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
