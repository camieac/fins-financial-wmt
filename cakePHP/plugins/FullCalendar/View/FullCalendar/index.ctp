<?php
/*
 * View/FullCalendar/index.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>
<script type="text/javascript">
plgFcRoot = '<?php echo $this->Html->url('/'); ?>' + "full_calendar";
</script>



<div class="Calendar index dRoundedBox">
	<div id="calendar"></div>
</div>
<div class="actions dRoundedBox">
	
	    <?php echo $this->Html->link('New Event','events/add', array('plugin' => 'full_calendar','class' => 'button')); ?>
		<?php echo $this->Html->link('Manage Events','events', array('plugin' => 'full_calendar', 'controller' => 'events','class' => 'button')); ?>
		<?php echo $this->Html->link('Manage Events Types','event_types', array('plugin' => 'full_calendar', 'controller' => 'event_types','class' => 'button')); ?>
	
	</div>
</div>
