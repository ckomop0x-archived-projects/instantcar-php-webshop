<?
function filterByCarMaker($array, $carmake) {
	$result = [];
	foreach ($array['cars'] as $key => $item) {
		if ($item['carmake'] == $carmake && $item['reserved'] != true ) {
			array_push($result, $item);
		} else {
			continue;
		}
	}
	return $result;
}