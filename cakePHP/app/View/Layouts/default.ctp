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
		echo $this->Html->script('jquery.min.js');
		echo $this->Html->script('skel.min');
		echo $this->Html->script('skel-layers.min');
		echo $this->Html->script('init');
		
		
		
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

		<div id="content">
<div id="header-wrapper">
			<div class="container">
				<div class="row">
					<div class="12u">
						
						<header id="header">
							<h1><a href="/" id="logo">eMarketTrader</a></h1>
							<nav id="nav">
								<a href="/">Homepage</a>
								<a href="/Clients">Clients</a>
								<a href="/Meetings">Meetings</a>
								<a href="/stocklists">Stocklists</a>
								<a href="/purchases" >Purchases</a>
							</nav>
						</header>
					
					</div>
				</div>
			</div>
		</div>
						</header>
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		
			<p>
				
			</p>
		</div>
	</div>

</body>
</html>
