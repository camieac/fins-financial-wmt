<?php //app/View/Users/login.ctp ?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Home</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			echo $this->Html->css('skel');
			echo $this->Html->css('style');
			echo $this->Html->css('style-desktop');
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
	</head>
	<body>
<div id="header-wrapper">
			<div class="container">
				<div class="row">
					<div class="12u">
						
						<header id="header">
							<h1><a href="/cakePHP/" id="logo">Finance Tool</a></h1>
							<nav id="nav">
								<a href="/cakePHP/" >Homepage</a>
								<a href="/cakePHP/Clients">Clients</a>
								<a href="/cakePHP/Meetings">Meetings</a>
								<a href="/cakePHP/stocklists" >Stocklists</a>
								<a href="/cakePHP/purchases" " class="current-page-item">Purchases</a>
							</nav>
						</header>
					
					</div>
				</div>
			</div>
		</div>
						</header>

<div class="user-login users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
       <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>