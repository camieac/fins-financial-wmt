<link href="../style.css" rel="stylesheet" type="text/css" />  


<style>
	
.div{
	width: 1500px;
}

#dark{
	background-color:#333;
	border:1px solid #000;
	padding:10px;
	margin-top:20px;}
	
#light{
	background-color:#FFF;
	border:1px solid #dedede;
	padding:10px;
	margin-top:20px;}	
	
li{ 
list-style:none;
	padding-top:10px;
	padding-bottom:10px;}	

.button, .button:visited {
	background: #222 url(overlay.png) repeat-x; 
	display: inline-block; 
	padding: 5px 10px 6px; 
	color: #fff; 
	text-decoration: none;
	-moz-border-radius: 6px; 
	-webkit-border-radius: 6px;
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
	text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
	border-bottom: 1px solid rgba(0,0,0,0.25);
	position: relative;
	cursor: pointer
}
 
	.button:hover							{ background-color: #111; color: #fff; }
	.button:active							{ top: 1px; }
	.small.button, .small.button:visited 			{ font-size: 11px}
	.button, .button:visited,
	.medium.button, .medium.button:visited 		{ font-size: 13px; 
												  font-weight: bold; 
												  line-height: 1; 
												  text-shadow: 0 -1px 1px rgba(0,0,0,0.25); 
												  }
												  
	.large.button, .large.button:visited 			{ font-size: 14px; 
													  padding: 8px 14px 9px; }
													  
	.super.button, .super.button:visited 			{ font-size: 34px; 
													  padding: 8px 14px 9px; }
	
	.pink.button, .magenta.button:visited		{ background-color: #e22092; }
	.pink.button:hover							{ background-color: #c81e82; }
	.green.button, .green.button:visited		{ background-color: #91bd09; }
	.green.button:hover						    { background-color: #749a02; }
	.red.button, .red.button:visited			{ background-color: #e62727; }
	.red.button:hover							{ background-color: #cf2525; }
	.orange.button, .orange.button:visited		{ background-color: #ff5c00; }
	.orange.button:hover						{ background-color: #d45500; }
	.blue.button, .blue.button:visited		    { background-color: #2981e4; }
	.blue.button:hover							{ background-color: #2575cf; }
	.yellow.button, .yellow.button:visited		{ background-color: #ffb515; }
	.yellow.button:hover						{ background-color: #fc9200; }
		</style> 


<?php
$company = $this->params['url']['stock'];
$result = $this->Stocks->get(array($company));

echo $this->Html->script('javascript');
?>

<?php
$result = $this->Stocks->getHistory(array($company));
array_shift($result); //Takes away the first array position that contains the names of the elements.
?>

<!-- <table>
<tr>
<th>Date</th>
<th>Open</th>
<th>High</th>
<th>Low</th>
<th>Close</th>
<th>Volume</th>
<th>Adjusted Close</th>
</tr>
<?php foreach ($result as $stock): ?>
<tr>
<td><?php echo $stock['date'] ?></td>
<td><?php echo $stock['open'] ?></td>
<td><?php echo $stock['high'] ?></td>
<td><?php echo $stock['low'] ?></td>
<td><?php echo $stock['close'] ?></td>
<td><?php echo $stock['volume'] ?></td>
<td><?php echo $stock['adjusted_close'] ?></td>
</tr>
<?php endforeach; ?>
</table> 



<?php
$url = 'http://chart.finance.yahoo.com/z?s=';
$url .= $company;
$url .= '&q=l&l=on&z=l&lang=en-GB&region=GB';
$url .= '&t=';
?>

<img id="chart" src= "<?php echo $url ?>6m" alt="Chart" ?/><br/><br/></img>	
       
        <button onclick="timescaleOneMonth()" class="small button green">One Month</button>
        <button onclick="timescaleSixMonth()" class="small button green">Six Months</button>
        <button onclick="timescaleOneYear()" class="small button green">One Year</button>
        <button onclick="timescaleFiveYear()" class="small button green">Five Years</button>
        <button onclick="timescaleMaxYear()" class="small button green">Max.</button>
        
<script type="text/javascript">
  var url = <?php echo json_encode($url); ?>;
</script>

--!>

<?php
$company = $this->params['url']['stock'];
$result = $this->Stocks->getHistory(array($company));
array_shift($result); //Takes away the first array position that contains the names of the elements.

?>   

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
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

	<?$date = $stock['date'];
	list($year, $month, $day) = split('[/.-]', $date);
	$dateString = $year.",".$month.",".$day;?>

      data.addRows([
        [new Date(<?php echo $dateString ?>), <?php echo $stock['open'] ?>, <?php echo $stock['close'] ?>, <?php echo $stock['high'] ?>, <?php echo $stock['low'] ?>]
      ]);
	<?php endforeach; ?>

      var options = {
        width: 1890,
        height: 700,
	thickness: 0,
	legendPosition: 'newRow',
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
      
    </script>

    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>

</script>

