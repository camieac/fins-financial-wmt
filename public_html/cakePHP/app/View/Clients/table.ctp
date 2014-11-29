<?php
$company = $this->params['url']['stock'];
$result = $this->Stocks->get(array($company));

echo $this->Html->script('javascript');
	
print "<pre>";
print_r($result);
print "</pre>";


echo implode('<br>', $result[0]);

echo '</br></br>';

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

