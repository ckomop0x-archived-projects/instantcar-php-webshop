<?php

function searchForArticul($id, $array) {
	foreach ($array as $key => $val) {
		if ($val['articul'] === $id) {
			return $key;
		}
	}
	return null;
}