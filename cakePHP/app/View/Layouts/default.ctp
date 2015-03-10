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

		echo $this->fetch('meta');
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