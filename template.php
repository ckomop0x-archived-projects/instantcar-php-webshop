<div class="detail-page-item col-md-12">
	<h1 class="col-md-12"><?=$detail['title']?></h1>
	<div class="detail-page-item__content">
		<div class="row">
			<div class="col-md-6">
				<div id="carouselExampleControls " class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?foreach ($detail['images'] as $key => $image) {?>
							<li data-target="#carouselExampleIndicators" data-slide-to="<?=$key-1;?>" class="<?=$key == 1 ? 'active' : '';?>"></li>
						<? }; ?>
					</ol>
					<div class="carousel-inner" role="listbox">
						<?foreach ($detail['images'] as $key => $image) {?>
							<div class="carousel-item <?=$key == 1 ? 'active' : '';?>">
								<img class="d-block img-fluid" src="<?=$image?>" title="<?=$detail['title']?>" alt="<?=$detail['title']?>" style="height: 300px;">
								<div class="carousel-caption d-none d-md-block">
									<p><?=$detail['title']?></p>
								</div>
							</div>
						<? }; ?>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="background: #000;">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="background: #000;">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<div class="col-md-6">
				<div>Articul: <?=$detail['articul']?></div>
				<div>Mileage: <?=$detail['mileage']?></div>
				<div>Carmake: <?=$detail['carmake']?></div>
				<div>Model: <?=$detail['model']?></div>
				<div>Price: <?=number_format($detail['price'])?>€</div>
				<button class="btn btn-success detail-page-item__order" data-articul="<?=$detail['articul']?>">Make reserve</button>
			</div>
		</div>


		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Reservation succesfull!
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Already reserved
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>