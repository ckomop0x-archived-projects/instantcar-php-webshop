
<?if ($addr[1] == 'auto' && count($addr) == 3) {
	echo '<h1>Car detail page</h1>';
	$carsData = file_get_contents("data.json");
	$parsedData = json_decode( $carsData, true);
	function searchForId($id, $array) {
		foreach ($array as $key => $val) {
			if ($val['articul'] === $id) {
				return $key;
			}
		}
		return null;
	}
	$id = searchForId($addr[2], $parsedData['cars']);
	?><pre><?
	print_r($parsedData['cars'][$id]);
	?></pre><?
//		    echo $parsedData[array_search($addr[2], $parsedData)];
} ?>
<? if ($notFound == true) { ?>
	<h1><?=$title;?></h1><? } ;?>