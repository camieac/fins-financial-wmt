<?php
/*
 * Views/EventTypes/edit.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>
<div class="eventTypes form dRoundedBox">
<?php echo $this->Form->create('EventType');?>
	<fieldset>
 		<legend><?php __('Edit Event Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('color', 
					array('options' => array(
						'Blue' => 'Blue',
						'Red' => 'Red',
						'Pink' => 'Pink',
						'Purple' => 'Purple',
						'Orange' => 'Orange',
						'Green' => 'Green',
						'Gray' => 'Gray',
						'Black' => 'Black',
						'Brown' => 'Brown'
					)));

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions dRoundedBox">
	<ul>
		<li><?php echo $this->Html->link('View Event Type','view', array('plugin' => 'full_calendar', 'class' => 'button', $this->Form->value('EventType.id'))); ?></li>
		<li><?php echo $this->Html->link('Manage Event Types','index', array('plugin' => 'full_calendar', 'class' => 'button'));?></li>
		<li><li><?php echo $this->Html->link('View Calendar','/full_calendar', array('plugin' => 'full_calendar', 'class' => 'button')); ?></li>
	</ul>
</div>
