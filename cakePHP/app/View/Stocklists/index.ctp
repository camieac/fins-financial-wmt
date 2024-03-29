<!-- File: /app/View/Stocklists/index.ctp -->


<html>
	<head>
		<title>Stocklists</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
		
		
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
	</head>
	<body>


<?php $User = ClassRegistry::init('User'); ?>

	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
 	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
		<style>
.dRoundedBox {
width:100%;

}
		</style>
<script type="text/javascript"> $(document).ready(function() {
	$('#stocks').DataTable({
	"bLengthChange": false,
	"searching": true
	}
	);

	$('#submit-link').click(function(){
  $('#StocklistIndexForm').submit();
});

} ); </script>
<script>
  $(function() {
function custom_source(request, response) {
        var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
        response($.grep(stocks, function(value) {
            return matcher.test(value.label)
                || matcher.test(value.desc);
        }));
    }
    var stocks = <?php echo $jsonStocks ?>;
    $( "#dSearch" ).autocomplete({
      source: custom_source,
	minLength: 0,
	
	select: function( event, ui ) {
        	$( "#dSearch" ).val( ui.item.label );
		$( "#dSearch-description" ).html( ui.item.desc );
		return false;
	}
    })
	.autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" + item.label + "<br>" + item.desc + "</a>" )
        .appendTo( ul );
    };
  });


  </script>


<h2>Stocklists</h2>

<div class="dRoundedBox">
<?php
echo $this->Form->create('Stocklist', array('class' => 'fForm'));
echo $this->Form->input('symbol', array('id' => 'dSearch')); ?>
<p id="dSearch-description"></p>
<div class='submit'>
<?php  echo $this->Form->submit('Add Stock', array('div'=>false, 'name'=>'add', 'class' => 'button'));
?>
<?php //echo $this->Html->link('Add Stock','#', array('id' => 'submit-link','class' => 'button')); ?>

</div>
<?php echo $this->Form->end()?>
</div>
<div class="dRoundedBox">

<table id="stocks" class="display" cellspacing="0" width="100%">
<thead>
<tr>

<th>Symbol</th>
<th>Name</th>
<!--<th>Change Percentage</th> -->
<th>Current Value</th>
<th>Open Value</th>
<th>Close Value</th>
<th>High Value</th>
<th>Low Value</th>
<th>Date Checked</th>
</tr>
</thead>
<!-- Here's where we loop through our $stocklists array, printing out stocklist info -->
<?php foreach ($stocklists as $stocklist): ?>
<tr>

<td><?php echo $stocklist['Stocklist']['symbol']; ?></td>
<td>
<?php $company = $stocklist['Stocklist']['symbol'];


echo $this->Html->link(str_replace("\"", "", $stocklist['Stocklist']['name']), array('action' => 'view?stock=' . $stocklist['Stocklist']['symbol']));?>
</td>
<!td ><?php //echo str_replace("\"", "", $stock['change']).'%'; ?><!/td>
<td><?php if($stocklist['Stocklist']['current'] = 'N/A'){echo $stocklist['Stocklist']['close'];}else{echo $stocklist['Stocklist']['current']; } //Using close price if current price is not available ?></td> 
<td><?php echo $stocklist['Stocklist']['open'] ?></td>
<td><?php echo $stocklist['Stocklist']['close'] ?></td>
<td><?php echo $stocklist['Stocklist']['high'] ?></td>
<td><?php echo $stocklist['Stocklist']['low'] ?></td>
<td><?php echo $stocklist['Stocklist']['date'] . '   ' . $this->Html->link('Update', array('action' => 'update?id=' . $stocklist['Stocklist']['id'])) ?></td>

</td>

</tr>
<?php endforeach; ?>
</table>

</div>


