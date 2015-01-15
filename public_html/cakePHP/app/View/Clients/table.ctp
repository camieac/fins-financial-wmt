<?php
$company = $this->params['url']['stock'];
$result = $this->Stocks->get(array($company));

echo $this->Html->script('javascript');
	
print "<pre>";
print_r($result);
print "</pre>";

?>

<table>
<tr>
<th>Name</th>
<th>Symbol</th>
<th>Change</th>
<th>Current</th>
<th>Open</th>
<th>Close</th>
<th>High</th>
<th>Low</th>
<th>Date</th>
</tr>
<?php foreach ($result as $stock): ?>
<tr>
<td><?php echo $stock['name'] ?></td>
<td><?php echo $stock['symbol'] ?></td>
<td><?php echo $stock['change'] ?></td>
<td><?php echo $stock['current'] ?></td>
<td><?php echo $stock['open'] ?></td>
<td><?php echo $stock['close'] ?></td>
<td><?php echo $stock['high'] ?></td>
<td><?php echo $stock['low'] ?></td>
<td><?php echo $stock['date'] ?></td>
</tr>
<?php endforeach; ?>
</table>

<?php
$result = $this->Stocks->getHistory(array($company));
array_shift($result); //Takes away the first array position that contains the names of the elements.
?>

<table>
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

<script src="http://charts.wikinvest.com/wikinvest/wikichart/javascript/scripts.php" type="text/javascript"></script><div id="wikichartContainer_E7981FD0-8456-5460-A2F0-ECFD29ABE841">
	<div id="wikichartContainer_E7981FD0-8456-5460-A2F0-ECFD29ABE841_noFlash" style="width:1000px; display:none;"><a href="http://get.adobe.com/flashplayer/">
		<img src="http://cdn.wikinvest.com/wikinvest/images/adobe_flash_logo.gif" alt="Flash" style="border-width: 0px;"/><br/>Flash Player 9 or higher is required to view the chart<br/>
		<strong>Click here to download Flash Player now</strong></a></div></div><script type="text/javascript">if (typeof(embedWikichart) != "undefined") 
		{embedWikichart("http://charts.wikinvest.com/WikiChartMini.swf","wikichartContainer_E7981FD0-8456-5460-A2F0-ECFD29ABE841","1000","400",
			{"ticker":"<?php echo $company ?>","embedCodeDate":"2015-1-15","liveQuote":"true","startDate":"26-12-2013","showAnnotations":"true","rollingDate":"","endDate":"28-07-2014"},{});}
			</script><div style="font-size:9px;text-align:right;width:400px;font-family:Verdana">
				

<?php
$url = 'http://chart.finance.yahoo.com/z?s=';
$url .= $company;
$url .= '&q=l&l=on&z=l&lang=en-GB&region=GB';
$url .= '&t=';
?>
<img id="chart" src= "<?php echo $url ?>6m" alt="Chart" ?></br>

<button onclick="timescaleOneMonth()">One Month</button>

<button onclick="timescaleSixMonth()">Six Months</button>

<button onclick="timescaleOneYear()">One Year</button>

<button onclick="timescaleFiveYear()">Five Years</button>

<script type="text/javascript">
  var url = <?php echo json_encode($url); ?>;
</script>

