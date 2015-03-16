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
		
			//echo $this->Html->css('fullcalendar.print'); 
			echo $this->Html->css('/full_calendar/css/fullcalendar', null, array('inline' => false));
			//cdn.datatables.net/1.10.5/css/jquery.dataTables.min.css
			echo $this->Html->css(array('//cdn.datatables.net/1.10.5/css/jquery.dataTables.min.css'), null, array('inline' => false));
			echo $this->Html->script('jquery-1.11.2.js'); 
			//echo $this->Html->script('jquery-1.3.2.min'); 
			echo $this->Html->script('moment.min');
			//echo $this->Html->script('jquery.min'); 
			//echo $this->Html->script('jquery.min.js');
			
			echo $this->Html->script('skel.min');
			echo $this->Html->script('skel-layers.min');
			echo $this->Html->script('fullcalendar.min');
			echo $this->Html->script(array('/full_calendar/js/jquery-1.5.min', '/full_calendar/js/jquery-ui-1.8.9.custom.min', '/full_calendar/js/fullcalendar.min', '/full_calendar/js/jquery.qtip-1.0.0-rc3.min', '/full_calendar/js/ready'), array('inline' => 'false'));
			echo $this->Html->script('init');
			echo $this->Html->script(array('//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js'), array('inline' => false));
	
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
								<h1>
									<a href="/" id="logo">eMarketTrader</a>
								</h1>
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
						
			<div id="page">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	
		<div class="row">
			<div class="12u">
				<div id="copyright">
					&copy; Fin's Financials Ltd. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a>
			 | 		<a href = "/help">Help</a>  <?php if ($this->Session->read('Auth.User')){echo '|'.$this->Html->link('Logout','/users/logout', array('class' => 'button','controller' => 'users', 'action' => 'logout'));} ?>
				</div>
			</div>
		</div>
	</body>
	<?php echo $this->Html->script('jquery.datetimepicker');  ?>
	<?php echo $this->Html->css('jquery.datetimepicker');?>
</html>
