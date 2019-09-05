<?php
/**
 * Obtaining car brands
 * @param $array
 *
 * @return array
 */
function getCarmakers($array) {
	$result = [];
	foreach ($array['cars'] as $key => $item) {
		if (in_array($item['carmake'], $result) != true  && $item['reserved'] != true ) {
			array_push($result, $item['carmake']);
		} else {
			continue;
		}
	}
	return $result;
}