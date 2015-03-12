<?php
/*
 * View/EventTypes/index.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>
<div class="eventTypes index dRoundedBox">
	<h2><?php __('Event Types');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
            <th><?php echo $this->Paginator->sort('color');?></th>
			<th class="actions"></th>
	</tr>
	<?php
	$i = 0;
	foreach ($eventTypes as $eventType):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $eventType['EventType']['name']; ?>&nbsp;</td>
        <td><?php echo $eventType['EventType']['color']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('plugin' => 'full_calendar', 'action' => 'view', $eventType['EventType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('plugin' => 'full_calendar', 'action' => 'edit', $eventType['EventType']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions dRoundedBox">
	<ul>
		<li><?php echo $this->Html->link('New Event Type','add', array('plugin' => 'full_calendar', 'class' => 'button')); ?></li>
		<li><?php echo $this->Html->link('Manage Events','/events', array('plugin' => 'full_calendar', 'controller' => 'events', 'class' => 'button')); ?></li>
        <li><li><?php echo $this->Html->link('View Calendar','/full_calendar', array('plugin' => 'full_calendar', 'class' => 'button')); ?></li>
	</ul>
</div>
