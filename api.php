<?php

/*
 * Include some helpers
 */

include './helpers/getCarmakers.php';
include './helpers/filterByCarMaker.php';
include './helpers/filterByCarModel.php';
include './helpers/searchForArticul.php';
include './helpers/jsonResponse.php';

/*
 * Consts
 */

$CARS_FILE_NAME = './data/data3.json';
$CARS_DATA = file_get_contents($CARS_FILE_NAME);

$parsedData = json_decode( $CARS_DATA, true);

// Получение списка столбцов
foreach ($parsedData['cars'] as $key => $row) {
	$carmake[$key]  = $row['carmake'];
	$model[$key] = $row['model'];
}

array_multisort($carmake, SORT_ASC, $model, SORT_ASC, $parsedData['cars']);

$carMakers = getCarmakers($parsedData);

if (empty($_POST)) {
	$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
}

/*
 * Car reservation API
 */
if($_POST['request'] == 'reserve') {
	$id = searchForArticul($_POST['articul'], $parsedData['cars']);
	if ($parsedData['cars'][$id]['reserved'] == true) {
		$message = 'Already reserved';
	} else {
		$parsedData['cars'][$id]['reserved'] = true;
		$message = 'Reservation ok!';
	}

	$handle = fopen($CARS_FILE_NAME, 'w') or die('Cannot open file:  '.$CARS_FILE_NAME);
	fwrite($handle, json_encode($parsedData));
	fclose($handle);
	echo jsonResponse(array('data' => $message), 200);
}

/*
 * JSON data – all cars
 */
if($_POST['request'] == 'auto') {
	echo jsonResponse(array('data' => $parsedData), 200);
}

/*
 * JSON data – all carmakers
 */
if($_POST['request'] == 'carmakers') {
	echo jsonResponse(array('data' => $carMakers), 200);
}

if($_POST['request'] == 'carMake') {
	echo jsonResponse(array('data' => filterByCarMaker($parsedData, $_POST['carmake'])), 200);
}

if($_POST['request'] == 'carModel') {
	echo jsonResponse(array('data' => filterByCarModel($parsedData, $_POST['carmake'], $_POST['carmodel'])), 200);
}


