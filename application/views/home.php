<section class="content-section full-height-section py-5" style="background-color: #f1f3ff">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 pt-5">
				<h2>
					<strong>
						Tempat Jual & Beli Mobil Terbaik di Indonesia
					</strong>
				</h2>
				<p>
					Selamat datang di <?= APP_NAME ?>. Kami menyediakan mobil
					kualitas terbaik dengan harga terjangkau.
				</p>
			</div>
			<div class="col-lg-6 mb-5" style="padding-left: 5%">
				<img src="<?= assets('img/mobil.png') ?>" alt="Car Image" class="car-image" />
			</div>
		</div>
		<div class="row bg-light rounded p-4" id="cars">
			<?php foreach ($cars as $car) : ?>
				<div class="col-4">
					<div class="card">
						<div class="card-header">
							<img src="<?= assets('img/cars/' . $car->img_link) ?>" alt="Car Image" class="car-image img-fluid" />
						</div>
						<div class="card-body">
							<p class="card-title fw-bold text-danger">
								Rp. <?= number_format($car->price, 0, ',', '.') ?>
							</p>
							<h5><b><?= $car->brand_name . ' ' . $car->series_name ?></b></h5>
							<p class="card-text">
								<i class="fas fa-calendar"></i> <?= $car->year ?> |
								<i class="fas fa-map-pin"></i> <?= $car->registration_area ?> |
								<i class="fas fa-cogs"></i> <?= $car->transmission ?>
							</p>
							<a href="<?= base_url('cars/detail/' . $car->bpkb_number) ?>" class="btn btn-primary">Detail</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
