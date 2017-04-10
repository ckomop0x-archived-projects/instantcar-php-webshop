
<section class="big-picture">
  <div class="big-picture-title">#InstantCar</div>
  <div class="big-picture-text">Enjoy our service.<br>Best service for buying used cars in Germany</div><a class="big-picture-button" href="/search">Enjoy</a>
</section>
<!--include ../sub-menu/sub-menu-->
<div class="h2 col-12 top-elements__title">Top elements</div>
<div class="top-elements">
  <? foreach ($PARSED_DATA['cars'] as $key => $car) {?>
    <? if (isset($car['top']) && $car['top'] == true) { ?>
  <article class="top-elements__item"><a class="top-elements__item__link" href="/auto/<?=$car["articul"]?>"><img src="<?=$car["images"][1]?>" alt="<?=$car["title"]?>">
      <div class="top-elements__item__description">
        <div class="maindata">
          <div class="carName"><?=$car["carmake"]?> <?=$car["model"]?></div>
          <div class="info">
            <nobr><b>Mileage:&nbsp;</b><?=$car["mileage"]?></nobr>
            <nobr></nobr>
          </div>
        </div>
        <div class="pricedata">
          <div class="price"><b>Price:</b>
            <?=$car["price"]?>
            €
          </div>
          <div class="finance"></div>
        </div>
      </div></a></article>
    <? } ?>
  <? } ?>
</div>