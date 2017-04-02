<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?=$title;?></title>
    <link href="/assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="/dist/styles.a41c4565aa2e7835e2a3.css" rel="stylesheet"></head>
  <body>
    <!-- renders header-->
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
    <?if ($addr[1] == 'search' || $addr[1] == 'auto') { ?>
    <div class="filter">
      <div id="searchapp">Place for search app</div>
    </div>
    <? } ?>
    <? if ($notFound == true) { ?>
    <h1><?=$title;?></h1><? } ;?>
    <footer class="footer">Some text in the footer</footer>
  <script type="text/javascript" src="/dist/index.a41c4565aa2e7835e2a3.js"></script><script type="text/javascript" src="/dist/styles.a41c4565aa2e7835e2a3.js"></script></body>
</html>