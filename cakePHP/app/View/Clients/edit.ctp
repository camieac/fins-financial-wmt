<html>
	<head>
		<title>Add Client</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
		
		<?php echo $this->Html->script('jquery.min'); ?>
		
		<?php echo $this->Html->script('skel.min'); ?>
		
		<?php echo $this->Html->script('skel-layers.min'); ?>
		
		<?php echo $this->Html->script('init'); ?>
		<noscript>
		<?php $this->Html->css('skel','stylesheet', array('inline' => false ) ); ?>
		<?php $this->Html->css('style','stylesheet', array('inline' => false ) ); ?>
		<?php $this->Html->css('style-desktop','stylesheet', array('inline' => false ) ); ?>
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
								<a href="/cakePHP/Clients"class="current-page-item">Clients</a>
								<a href="/cakePHP/Meetings">Meetings</a>
								<a href="/cakePHP/stocklists" >Stocklists</a>
								<a href="/cakePHP/purchases" >Purchases</a>
							</nav>
						</header>
					
					</div>
				</div>
			</div>
		</div>
						</header>


<?php $advisorarray = Set::flatten($FAquery); 

 for ($j = 0; $j < count($advisorarray)/2; ++$j) 
 {
        $fa[$advisorarray[$j.'.fas.username']] = $advisorarray[$j.'.fas.name'];
 } 

?>

<?php
echo $this->Form->create('Client');
echo $this->Form->input('name');
echo $this->Form->input('gender');
echo $this->Form->input('dateOfBirth', array('dateFormat'=>'DMY', 'minYear'=>date('Y')-99, 'maxYear'=>date('Y')-9, 'empty'=>array('- -')));
echo $this->Form->input('nis', array('label' => array('text' => 'National Insurance Number')));
echo $this->Form->input('phoneNo');
echo $this->Form->input('address');
echo $this->Form->input('balance');
echo $this->Form->input('fa',array('type'=>'select','options'=>$fa)); 
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>