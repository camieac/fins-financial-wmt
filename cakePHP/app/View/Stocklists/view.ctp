 


<?php
$this->layout = 'graph2';
$company = $this->params['url']['stock'];
$result = $this->Stocks->get(array($company));

echo $this->Html->script('javascript');
?>

<?php
$result = $this->Stocks->getHistory(array($company));
array_shift($result); //Takes away the first array position that contains the names of the elements.
?>

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

function resizeChart () {
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

    <!--Div that will hold the pie chart-->
    <div id="chart_div" style="width: 90%; height: 700px;"></div>

</script>

