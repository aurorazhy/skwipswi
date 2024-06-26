<section class="content-section full-height-section py-5" style="background-color: #f1f3ff">
	<div class="container">
		<div class="row bg-light rounded p-4 align-items-stretch">
			<div class="col d-flex flex-column">
				<div class="row">
					<div class="col">
						<img src="<?= assets('img/cars/' . $car->img_link) ?>" alt="Car Image" class="car-image img-fluid rounded-top" />
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="card">
							<div class="card-body">
								<p style="text-align: justify;">
									<?= $car->description ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col d-flex flex-column">
				<div class="card h-100">
					<div class="card-body">
						<p class="card-title fw-bold text-danger">
							Rp. <?= number_format($car->price, 0, ',', '.') ?>
						</p>
						<h4><b><?= $car->brand_name . ' ' . $car->series_name ?></b></h4>
						<table class="table table-borderless">
							<tbody>
								<tr>
									<td style="width: 5%;">
										<i class="fa-lg fas fa-tachometer-alt"></i>
									</td>
									<td><b>Kilometer</b></td>
									
									<td style="width: 5%;">
										<i class="fa-lg fas fa-calendar"></i>
									</td>
									<td>
										<b>Tahun Produksi</b>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<?= number_format($car->kilometers, 0, ',', ',') ?> km
									</td>
									<td></td>
									<td>
										<?= $car->year ?>
									</td>
								</tr>
								<tr>
									<td>
										<i class="fa-lg fas fa-gas-pump"></i>
									</td>
									<td>
										<b>Bahan Bakar</b>
									</td>
									<td>
										<i class="fa-lg fas fa-cogs"></i>
									</td>
									<td>
										<b>Transmisi</b>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<?= $car->fuel ?>
									</td>
									<td></td>
									<td>
										<?= $car->transmission ?>
									</td>
								</tr>
								<tr>
									<td>
										<i class="fa-lg fas fa-map-pin"></i>
									</td>
									<td>
										<b>Area Registrasi</b>
									</td>
									<td>
										<i class="fa-lg fas fa-tachometer-alt"></i>
									</td>
									<td>
										<b>CC Mesin</b>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<?= $car->registration_area ?>
									</td>
									<td></td>
									<td>
										<?= $car->cc_engine ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="card-footer d-flex justify-content-evenly align-items-center">
						<?php if (!is_logged_in()) : ?>
							<a class="btn btn-primary" href="<?= base_url('auth/login') ?>">
								Meet Up
							</a>
							<a class="btn btn-success" href="<?= base_url('auth/login') ?>">
								Beli
							</a>
						<?php else : ?>
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#appointmentModal">
								Meet Up
							</button>
							<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#buyCarModal">
								Beli
							</button>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
