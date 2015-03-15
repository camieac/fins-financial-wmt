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
	
	    <?php echo $this->Html->link('Add Meeting','../meetings/add', array('class' => 'button')); ?>
		<?php echo $this->Html->link('View Meetings','../meetings', array('class' => 'button')); ?>
		
	
	</div>
</div>
