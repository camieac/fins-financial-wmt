<!-- app/View/Users/change_password.ctp -->
<div class = "dRoundedBox">
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Edit home page settings'); ?></legend>
        <?php 
		echo $this->Form->create('User');
		echo $this->Form->input('id');
		echo $this->Form->input('index1');
		echo $this->Form->input('index2');
		echo $this->Form->input('index3');
		echo $this->Form->input('index4');
		echo $this->Form->input('home_twitter');

	?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
