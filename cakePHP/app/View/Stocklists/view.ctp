<title>View:  <?php echo $symb?></title>
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['annotationchart']}]}"></script>
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
<script type="text/javascript"> $(document).ready(function() {
	$('#chart_table').DataTable({
	"bLengthChange": false
	}
	);
$('#tNews').DataTable({
	"bLengthChange": false,
	"scrollY":"200px"
	}
	);
	$('#submit-link').click(function(){
  $('#StocklistIndexForm').submit();
});

} ); </script>
<?php
ini_set('memory_limit','256M');
$company = $this->params['url']['stock'];

$result = $api->get(array($company));

echo $this->Html->script('javascript');
?>



<?php
$company = $this->params['url']['stock'];
$result = $api->getHistory(array($company));
array_shift($result); //Takes away the first array position that contains the names of the elements.

?>   


    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['annotationchart']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('date', 'Date');
      data.addColumn('number', 'Open Price');
      data.addColumn('number', 'Closed Price');
      data.addColumn('number', 'High Price');
      data.addColumn('number', 'Low Price');

	<?php foreach ($result as $stock): ?>

	<?php $date = $stock['date'];
	list($year, $month, $day) = split('[/.-]', $date);
	$dateString = $year.",".$month.",".$day;?>

      data.addRows([
        [new Date(<?php echo $dateString ?>), <?php echo $stock['open'] ?>, <?php echo $stock['close'] ?>, <?php echo $stock['high'] ?>, <?php echo $stock['low'] ?>]
      ]);
	<?php endforeach; ?>

      var options = {
		  width: 1000,
        height: 563,
	thickness: 0,
	legendPosition: 'newRow',
	displayZoomButtons: false,
	colors: ['#f29618', '#00a9e0', '#f60101', '#635042'],
        hAxis: {
          title: 'Date'
        },
        vAxis: {
          title: 'Value'
        }
      };

       var chart = new google.visualization.AnnotationChart(document.getElementById('chart_div'));
	
      chart.draw(data, options);

    }
    function hideColumn(columnNumber){
		//view = new google.visualization.AnnotationChart(data);
      var chart = new google.visualization.DataView(document.getElementById('chart_div'));
      
		switch(columnNumber) {
    case 0://Open
        chart.hideColumns([1]); 
    break;
    case 1://Close
        chart.hideColumns([2]); 
    break;
    case 2://High
        chart.hideColumns([3]); 
    break;
    case 3://Low
        chart.hideColumns([4]); 
    break;
    default:
        //Do nothing
}
chart.draw(data, options);
	}


if (document.addEventListener) {
    window.addEventListener('resize', resizeChart);
}
else if (document.attachEvent) {
    window.attachEvent('onresize', resizeChart);
}
else {
    window.resize = resizeChart;
}
      
    </script>

    <!--Div that will hold the line chart-->
<h3><?php echo $comp.' ('.$symb.')' ?></h3>
    <div id="chart_div" class="dRoundedBox"></div>

	<!--<div id="chart_controls" class="dRoundedBox">
	<button type="button" onclick="hideColumn(1)">Open Price</button>
	<button type="button" onclick="hideColumn(2)">Close Price</button>
	<button type="button" onclick="hideColumn(3)">High Price</button>
	<button type="button" onclick="hideColumn(4)">Low Price</button>
	</div> -->
	<div id="chart_table_div" class="dRoundedBox">

	<table id ="chart_table">
		<thead>
<tr>
<th>Date</th>
<th>Open</th>
<th>Close</th>
<th>High</th>
<th>Low</th>

</tr>
</thead>

<?php 

foreach ($result as $stock): ?>
<tr>
	<?php $date = $stock['date'];
	//list($year, $month, $day) = split('[/.-]', $date);
	//$dateString = $year."-".$month."-".$day;?>
<td><?php echo $date ?></td>
<td><?php echo $stock['open'] ?></td>
<td><?php echo $stock['close'] ?></td>
<td><?php echo $stock['high'] ?></td>
<td><?php echo $stock['low'] ?></td>
     
      </tr>
	<?php endforeach; ?>
	</table>
	</div>
<div id="chart_table_div" class="dRoundedBox">
  <h3><?php echo str_replace('Yahoo! Finance:','',$rss['rss']['channel']['title']);?></h3>
  <table id ="tNews">
	  <thead><tr><th></th></tr></thead>
	  <tbody>
	<?php
	//$items = $rss['rss'];
	//debug($items);
	$itemss = $rss['rss']['channel']['item'];
	
	//debug($itemss);

foreach($itemss as $item) { ?>
<tr><td><a title = "<?php echo $item['pubDate'] ?>" href="<?php echo $item['link'] ?>"><?php echo $item['title']; ?></a>	</td></tr>
	
<?php
}

	
	?></tbody></table>
	</div>

