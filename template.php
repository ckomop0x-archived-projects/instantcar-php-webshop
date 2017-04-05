<div class="detail-page-item" >
	<h1><?=$detail['title']?></h1>
	<div class="detail-page-item__content" style="display: flex; flex-direction: row;">
		<div class="slider-container" style="display: inline-block; width: 50%;">
			<div class="owl-carousel">
				<?foreach ($detail['images'] as $image) {?>
					<img src="<?=$image?>" title="<?=$detail['title']?>" alt="<?=$detail['title']?>"/>
				<? }; ?>
			</div>
		</div>
		<div class="description-container" style="display: inline-block; width: 50%;">
			<div>Articul: <?=$detail['articul']?></div>
			<div>Mileage: <?=$detail['mileage']?></div>
			<div>Carmake: <?=$detail['carmake']?></div>
			<div>Model: <?=$detail['model']?></div>
			<div>Price: <?=number_format($detail['price'])?>€</div>
			<button class="detail-page-item__order" data-articul="<?=$detail['articul']?>">Make reserve</button>
		</div>
	</div>
</div>


