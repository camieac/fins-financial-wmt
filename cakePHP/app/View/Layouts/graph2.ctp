<?php


$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	
	<?php
		
		echo $this->Html->meta('icon');

		echo $this->Html->css('skel');
		echo $this->Html->css('style');
		echo $this->Html->css('style-desktop');
		echo $this->Html->css('fullcalendar'); 
		echo $this->Html->css('fullcalendar.print'); 
 
		echo $this->Html->script('jquery-1.3.2.min.'); 
		echo $this->Html->script('moment.min'); 
 		echo $this->Html->script('jquery.min'); 
		echo $this->Html->script('fullcalendar.min'); 
		?><link href="https://ajax.googleapis.com/ajax/static/modules/gviz/1.0/core/tooltip.css" rel="stylesheet" type="text/css">

		<script src="https://www.google.com/uds/?file=visualization&amp;v=1&amp;packages=annotationchart" type="text/javascript"></script>
		
	<link href="https://www.google.com/uds/api/visualization/1.0/ce7a9bd29458c92c2c25b7969aaf2727/ui+en_GB,controls+en_GB,table+en_GB,annotationchart+en_GB.css" type="text/css" rel="stylesheet">
	<script src="https://www.google.com/uds/api/visualization/1.0/ce7a9bd29458c92c2c25b7969aaf2727/format+en_GB,default+en_GB,ui+en_GB,controls+en_GB,table+en_GB,corechart+en_GB,annotationchart+en_GB.I.js" type="text/javascript"></script>
		
		<?php echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		
			<p>
				
			</p>
		</div>
	</div>

</body>
</html>
