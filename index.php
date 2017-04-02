<?
/*
 * Parsing current address
*/
$addr = explode("/", $_SERVER["REQUEST_URI"]);
$notFound = false;

if(isset($_SERVER['REDIRECT_QUERY_STRING'])) {
	$get_string = $_SERVER['REDIRECT_QUERY_STRING'];
	parse_str($get_string, $get_array);
} else {
	$get_array = 0;
}


if ($addr[1] == ''
	|| $addr[1] == 'search'
	|| $addr[1] == 'auto'
	|| count($get_array) >= 2) {
	$title = 'Instamotion toy project';
	include 'page.php';
//	include 'content.php';
}
elseif ($addr[1] != '') {
	header("HTTP/1.0 404 Not Found");
	$notFound = true;
	$title = 'Page not found';
	include 'page.php';
}
?>