<?php //app/View/Users/login.ctp 
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Home</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
	
		
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		</head>
		<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript"> $(document).ready(function() {
	
	$('#submit-link').click(function(){
  $('#UserLoginForm').submit();
});
} ); </script>
<style>
div.input{
background:none;
}
input {
	float:none;
}
label {
	margin-right:1em;
}
</style>


	
	<body>


<div class="user-login users form">



<?php
echo $this->Session->flash('auth');
?>
<?php
echo $this->Form->create('User');
?>
    <fieldset>
        <legend>
            <?php
echo __('Please enter your username and password');
?>
        </legend>

       <?php
echo $this->Form->input('username',array('class' => 'iLogin'));
echo $this->Form->input('password',array('class' => 'iLogin'));
?>
    </fieldset>
<?php
echo $this->Form->submit('Login', array(
    'class' => 'button',
    'title' => 'Login'
));
?>
<?php
echo $this->Form->end();
?>


</div>
