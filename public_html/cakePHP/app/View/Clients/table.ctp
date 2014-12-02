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

