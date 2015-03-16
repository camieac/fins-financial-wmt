<<<<<<< HEAD
<html>
	<head>
		<title>Add Client</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
		
		
		<noscript>
		<?php $this->Html->css('skel','stylesheet', array('inline' => false ) ); ?>
		<?php $this->Html->css('style','stylesheet', array('inline' => false ) ); ?>
		<?php $this->Html->css('style-desktop','stylesheet', array('inline' => false ) ); ?>
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
	</head>
	<body>


=======
<h1>Edit Client</h1>
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375

<?php $advisorarray = Set::flatten($FAquery); 

 for ($j = 0; $j < count($advisorarray)/2; ++$j) 
 {
        $fa[$advisorarray[$j.'.fas.username']] = $advisorarray[$j.'.fas.name'];
 } 

?>
<<<<<<< HEAD
<div class = "dRoundedBox">
<?php
echo $this->Form->create('Client', array('class' => 'fForm'));
=======

<?php
echo $this->Form->create('Client');
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
echo $this->Form->input('name');
echo $this->Form->input('gender');
echo $this->Form->input('dateOfBirth', array('dateFormat'=>'DMY', 'minYear'=>date('Y')-99, 'maxYear'=>date('Y')-9, 'empty'=>array('- -')));
echo $this->Form->input('nis', array('label' => array('text' => 'National Insurance Number')));
echo $this->Form->input('phoneNo');
echo $this->Form->input('address');
echo $this->Form->input('balance');
<<<<<<< HEAD
echo $this->Form->input('fa',array('type'=>'select','options'=>$fa));
echo $this->Form->input('twitter'); 
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('Image.profileImage', array('type' => 'file'));
echo $this->Form->end(array('label' => 'Save Client','class' => 'button'));

?>
</div>
=======
echo $this->Form->input('fa',array('type'=>'select','options'=>$fa)); 
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
