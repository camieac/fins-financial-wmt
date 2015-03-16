<?php
class StocksHelper extends AppHelper {
	function get($symbols = array()) {
		$limit = 200;
		$chunks = ceil(count($symbols) / $limit);
		$stocks = array();
		for($i = 0; $i < $chunks; $i++) {
			$offset = (count($symbols) - ($i * $limit) > $limit) ? $limit : count($symbols) - ($i * $limit);
			$subset_symbols = array_slice($symbols, $i * $limit, $offset);
			$request ='http://download.finance.yahoo.com/d/quotes.csv?s=';
			foreach ($subset_symbols as $s) $request .= $s.'+';
			$request = substr($request, 0, strlen($request)-1);
			$request .= '&f=nsc6b2ophgd1t7';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $request);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			curl_close($ch);
			$splits = explode("\n", $output);
			foreach($splits as $s) {
				if (strlen($s)>0) {
					$s_data = explode(',', $s);
					$stocks[] = array(
						'name' => $s_data[0],
						'symbol' => $s_data[1],
						'change' => $s_data[2],
						'current' => $s_data[3],
						'open' => $s_data[4],
						'close' => $s_data[5],
						'high' => $s_data[6],
						'low' => $s_data[7],
						'date' => $s_data[8],
						'prediction' => $s_data[9]
					);
				}
			}
		}
		return $stocks;
	}
	
	
	function getHistory($symbols = array()) {
		$limit = 360;
		$chunks = ceil(count($symbols) / $limit);
		$stocks = array();
		for($i = 0; $i < $chunks; $i++) {
			$offset = (count($symbols) - ($i * $limit) > $limit) ? $limit : count($symbols) - ($i * $limit);
			$subset_symbols = array_slice($symbols, $i * $limit, $offset);
			$request ='http://ichart.finance.yahoo.com/table.csv?s=';
			foreach ($subset_symbols as $s) $request .= $s.'+';
			$request = substr($request, 0, strlen($request)-1);
			$currentYear = date('Y');
			$currentMonth = date('M');
			$currentDay = date('D');
			$lastYear = date('Y'-1);
<<<<<<< HEAD
			$request .= '&a=01&b=01&c=1900';
=======
			$request .= '&a=01&b=01&c=2000';
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
			$request .= '&d=$currentMonth&e=$currentDay&f=$currentYear';
			$request .= '&g=w'; // &g=w is weekly, &g=d is daily
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $request);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			curl_close($ch);
			$splits = explode("\n", $output);
			foreach($splits as $s) {
				if (strlen($s)>0) {
					$s_data = explode(',', $s);
					$stocks[] = array(
						'date' => $s_data[0],
						'open' => $s_data[1],
						'high' => $s_data[2],
						'low' => $s_data[3],
						'close' => $s_data[4],
						'volume' => $s_data[5],
						'adjusted_close' => $s_data[6]
					);
				}
			}
		}
		return $stocks;
	}
}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 9283f741b8c75a119d90aa68d0ac45998f85d375
