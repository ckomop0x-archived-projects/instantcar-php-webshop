<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?=$title;?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/6.0.0/normalize.min.css" rel="stylesheet">
    <link href="/assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link href="/dist/styles.489fce35d76e3bf196d4.css" rel="stylesheet"></head>
  <body>
    <!-- renders header-->
    <div class="wrapper">
      <div class="content">
        <header class="header">
<div class="header-container">
  <div class="row col-12"><a class="header-container__logo col-12 col-sm-6 col-md-8 col-xl-9" href="/" title="InstantCar"><img src="/assets/images/logo.svg" alt="InstantCar"></a>
    <div class="header-container__phone col-12 col-sm-6 col-md-4 col-xl-3">
      <div class="header-container__phone-title">
        <nobr></nobr>Costless Service Hotline:<br><a href="tel:+41234567890">41234567890</a>
      </div>
    </div>
  </div>
</div>
        </header>
        <!-- pages view router-->
<!-- Main page-->
<?if ($route == 'main-page') {
  include_once './pages/main-page.php';
  } ?>
<!-- Pages with filter-->
<?if ($addr[1] == 'search' || ($addr[1] == 'auto' && count($addr) == 2)) {
  include_once 'filter.php';
 } ?>
<!-- Detail auto page-->
<?if ($addr[1] == 'auto' && count($addr) == 3) {
    $id = searchForId($addr[2], $PARSED_DATA['cars']);
    $detail = $PARSED_DATA['cars'][$id];
    include_once 'template.php';;
} ?>
<!-- 404 Page--><? if ($notFound == true) { ?>
<h1><?=$title;?></h1><? } ;?>
      </div>
<div class="footer">
  <div class="row col-12">
    <div class="footer__copy col-12">&copy 2017 InstantCar</div>
  </div>
</div>
    </div>
    <script src="/libs/jquery-3.2.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script type="text/javascript" src="/dist/index.489fce35d76e3bf196d4.js"></script><script type="text/javascript" src="/dist/styles.489fce35d76e3bf196d4.js"></script></body>
</html>