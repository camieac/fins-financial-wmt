<!-- File: /app/View/Clients/view.ctp -->

<!DOCTYPE HTML>

<html>
	<head>
		<title>Add Client</title>
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
		
		<?php
echo $this->Html->script('jquery.min');
?>
		
		<?php
echo $this->Html->script('skel.min');
?>
		
		<?php
echo $this->Html->script('skel-layers.min');
?>
		
		<?php
echo $this->Html->script('init');
?>
		<noscript>
		<?php
$this->Html->css('skel', 'stylesheet', array(
    'inline' => false
));
?>
		<?php
$this->Html->css('style', 'stylesheet', array(
    'inline' => false
));
?>
		<?php
$this->Html->css('style-desktop', 'stylesheet', array(
    'inline' => false
));
?>
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

  <script>
  $(function() {
    $( ".datepicker" ).datetimepicker({timepicker:false,format:'Y-m-d'});
  });
  </script>
	</head>
	<body>



<h2>Add Client</h2>


<?php
$user = AuthComponent::user('username');
$advisorarray = Set::flatten($FAquery);
/*In the event that no FAs exist, use the current user as the FA. The current user will be an admin, since no FAs exist*/
if(empty($advisorarray)){$fa = array($user);}
else{
for ($j = 0; $j < count($advisorarray) / 2; ++$j) {
    $fa[$advisorarray[$j . '.users.username']] = $advisorarray[$j . '.users.name'];
}
}
?>


<div class = "dRoundedBox">
<?php
echo $this->Form->create('Client', array(
    'class' => 'fForm',
    'type' => 'file'
));
echo $this->Form->input('name');
echo $this->Form->input('email');
echo $this->Form->input('gender');
echo $this->Form->input('dateOfBirth', array(
    'class' => 'datepicker',
    'type' => 'text'
));
echo $this->Form->input('nis', array(
    'label' => array(
        'text' => 'National Insurance Number'
    )
));
echo $this->Form->input('phoneNo');
echo $this->Form->input('address');
echo $this->Form->input('balance');
if(AuthComponent::user('role') == 'admin'){
echo $this->Form->input('fa', array(
    'type' => 'select',
    'options' => $fa
));
}else{
echo $this->Form->input('fa', array(
    'type' => 'hidden',
    'value' => $user
));
}
echo $this->Form->input('twitter');
echo $this->Form->input('Client.profileImage', array(
    'type' => 'file'
));
echo $this->Form->input('imageName', array(
    'type' => 'hidden',
    'value' => ''
));
echo $this->Form->end(array(
    'label' => 'Save Client',
    'class' => 'button'
));
?>
</div>
