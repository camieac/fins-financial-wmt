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
  <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( ".datepicker" ).datetimepicker({timepicker:false,format:'Y-m-d'});
  });
  </script>
	</head>
	<body>



<h1>Add Client</h1>


<?php
$advisorarray = Set::flatten($FAquery);

for ($j = 0; $j < count($advisorarray) / 2; ++$j) {
    $fa[$advisorarray[$j . '.fas.username']] = $advisorarray[$j . '.fas.name'];
}

?>


<div class = "dRoundedBox">
<?php
echo $this->Form->create('Client', array(
    'class' => 'fForm',
    'type' => 'file'
));
echo $this->Form->input('name');
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
echo $this->Form->input('fa', array(
    'type' => 'select',
    'options' => $fa
));
echo $this->Form->input('twitter');
echo $this->Form->input('Client.profileImage', array(
    'type' => 'file'
));
echo $this->Form->input('imageName', array(
    'type' => 'hidden',
    'value' => sha1(openssl_random_pseudo_bytes(100))
));
echo $this->Form->end('Save Client');
?>
</div>
