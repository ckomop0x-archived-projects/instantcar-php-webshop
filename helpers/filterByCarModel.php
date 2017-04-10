<?
function filterByCarModel($array, $carmake, $carmodel) {
	$result = [];
	foreach ($array['cars'] as $key => $item) {
		if ($item['carmake'] == $carmake && $item['model'] == $carmodel && $item['reserved'] != true ) {
			array_push($result, $item);
		} else {
			continue;
		}
	}
	return $result;
}