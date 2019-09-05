<?php
/**
 * Filtering cars by brand
 * @param $array
 * @param $carmake
 *
 * @return array
 */
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