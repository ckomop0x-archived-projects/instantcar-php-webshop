<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?=$title;?></title>
    <link href="/assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/libs/owl/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/libs/owl/assets/owl.theme.green.min.css">
  <link href="/dist/styles.24046af1471c24802996.css" rel="stylesheet"></head>
  <body>
    <!-- renders header-->
    <div class="wrapper">
      <header class="header">
<div class="header-container"><a class="header-container__logo" href="/"><img src="/assets/images/instamotion.png"></a><a class="header-container__phone" href="tel:+41234567890">41234567890</a>
  <div class="header-container__menu">
    <ul>
      <li>Garantie</li>
      <li>Contacts</li>
    </ul>
  </div>
</div>
      </header>
      <?if ($addr[1] == '') {
        include 'content.php';
        } ?>
      <?if ($addr[1] == 'search' || ($addr[1] == 'auto' && count($addr) == 2)) {
        include 'filter.php';
       } ?>
      <?if ($addr[1] == 'auto' && count($addr) == 3) {
        echo '<h1>Car detail page</h1>';
        $carsData = file_get_contents("data.json");
        $parsedData = json_decode( $carsData, true);
        function searchForId($id, $array) {
          foreach ($array as $key => $val) {
            if ($val['articul'] === $id) {
              return $key;
            }
          }
          return null;
        }
        $id = searchForId($addr[2], $parsedData['cars']);
        $detail = $parsedData['cars'][$id];
        include 'detail.php';
        /* ?><pre><?
          print_r($parsedData['cars'][$id]);
        ?></pre><? */
      } ?>
      <? if ($notFound == true) { ?>
      <h1><?=$title;?></h1><? } ;?>
    </div>
    <footer class="footer">Some text in the footer</footer>
    <script src="/libs/jquery-3.2.0.min.js"></script>
    <script src="/libs/owl/owl.carousel.min.js"></script>
  <script type="text/javascript" src="/dist/index.24046af1471c24802996.js"></script><script type="text/javascript" src="/dist/styles.24046af1471c24802996.js"></script></body>
</html>