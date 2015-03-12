<?php
/*
 * View/Events/view.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>
<div class="events view dRoundedBox">
<h2><?php echo __('Event'); ?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Event Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($event['EventType']['name'], array('controller' => 'event_types', 'action' => 'view', $event['EventType']['id'])); ?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['title']; ?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Details'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['details']; ?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['status']; ?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Start'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['start']; ?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('End'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php if($event['Event']['all_day'] != 1) { echo $event['Event']['end']; } else { echo "N/A"; } ?></dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('All Day'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php if($event['Event']['all_day'] == 1) { echo "Yes"; } else { echo "No"; } ?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['created']; ?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['modified']; ?></dd>
	</dl>
</div>
<div class="actions dRoundedBox">
	<ul>
		<li><?php echo $this->Html->link('Edit Event','edit', array('plugin' => 'full_calendar', 'class' => 'button', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Html->link('Delete Event','delete', array('plugin' => 'full_calendar', 'class' => 'button', $event['Event']['id']), null, sprintf(__('Are you sure you want to delete this %s event?', true), $event['EventType']['name'])); ?> </li>
		<li><?php echo $this->Html->link('Manage Events','index', array('plugin' => 'full_calendar', 'class' => 'button')); ?> </li>
		<li><li><?php echo $this->Html->link('View Calendar','/full_calendar', array('plugin' => 'full_calendar', 'class' => 'button')); ?></li>
	</ul>
</div>
