<!-- app/View/Users/change_password.ctp -->
<div class = "dRoundedBox">
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Edit home page settings'); ?></legend>
        <?php 
		echo $this->Form->create('User');
		echo $this->Form->input('id');
		echo $this->Form->input('index1',array('label' => array('text' => 'Ticker 1')));
		echo $this->Form->input('index2',array('label' => array('text' => 'Ticker 2')));
		echo $this->Form->input('index3',array('label' => array('text' => 'Ticker 3')));
		echo $this->Form->input('index4',array('label' => array('text' => 'Ticker 4')));
		echo $this->Form->input('indexDisplay', array('label' => array('text' => 'Enable home page graphs')));
		echo $this->Form->input('home_twitter',array('label' => array('text' => 'Twitter Hashtag')));

	?>
    </fieldset>
<?php echo $this->Form->end(array(
    'label' => 'Save Settings',
    'class' => 'button'
)); ?>
</div>
</div>
