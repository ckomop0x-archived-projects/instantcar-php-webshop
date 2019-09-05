<?php
/**
 * Filtering cars by brand and model
 * @param $array
 * @param $carmake
 * @param $carmodel
 *
 * @return array
 */
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