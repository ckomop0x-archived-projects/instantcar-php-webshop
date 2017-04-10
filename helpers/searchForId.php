<?php
/**
 * Created by PhpStorm.
 * User: p.klochkov
 * Date: 08.04.17
 * Time: 15:20
 */

function searchForId($id, $array) {
	foreach ($array as $key => $val) {
		if ($val['articul'] === $id) {
			return $key;
		}
	}
	return null;
}