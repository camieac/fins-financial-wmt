<head>
<title>Edit Meeting</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
        <!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( ".datepicker" ).datetimepicker();
  });
  </script>

</head>

<h1>Edit Meeting</h1>

<div class="dRoundedBox">
<?php
echo $this->Form->create('Meeting', array(
    'class' => 'fForm'
));
echo $this->Form->input('title');
echo $this->Form->input('details');

$namesC = array_column(array_column($customer,'Client'),'name');
$idsC = array_column(array_column($customer,'Client'),'id');
$idNamesC = array_combine($idsC,$namesC);

echo $this->Form->input('customer', array(
    'type' => 'select',
    'options' => $idNamesC
));


$namesF = array_column(array_column($fa,'User'),'username');
$idsF = array_column(array_column($fa,'User'),'id');
//debug($names);
$idNamesF = array_combine($idsF,$namesF);


if ($user == "admin") {
    echo $this->Form->input('fa', array(
        'type' => 'select',
        'options' => $idNamesF
    ));
} else {
    echo $this->Form->input('fa', array(
        'type' => 'select',
        'options' => $idNamesF,
        'default' => $userID,
        'type' => 'hidden'
    ));
}

echo $this->Form->input('event_type_id', array(
    'type' => 'select',
    'default' => 0,
    'type' => 'hidden'
));



echo $this->Form->input('status', array(
    'options' => array(
        'Scheduled' => 'Scheduled',
        'Confirmed' => 'Confirmed',
        'In Progress' => 'In Progress',
        'Rescheduled' => 'Rescheduled',
        'Completed' => 'Completed'
    )
));


echo $this->Form->input('start', array(
    'class' => 'datepicker',
    'type' => 'text'
));
echo $this->Form->input('end', array(
    'class' => 'datepicker',
    'type' => 'text'
));
echo $this->Form->input('all_day', array(
    'checked' => 'checked'
));
echo $this->Form->end('Save Meeting');
?></div>
