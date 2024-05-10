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
						<h5 class="card-text"><?= $car->brand_name . ' ' . $car->model_name ?></h5>
						<table class="table table-borderless">
							<tbody>
								<tr>
									<td style="width: 5%;">
										<i class="fas fa-tachometer-alt"></i>
									</td>
									<td>
										<?= number_format($car->kilometers, 0, ',', ',') ?> km
									</td>
									<td style="width: 5%;">
										<i class="fas fa-calendar"></i>
									</td>
									<td>
										<?= $car->year ?>
									</td>
								</tr>
								<tr>
									<td>
										<i class="fas fa-gas-pump"></i>
									</td>
									<td>
										<?= $car->fuel ?>
									</td>
									<td>
										<i class="fas fa-cogs"></i>
									</td>
									<td>
										<?= $car->transmission ?>
									</td>
								</tr>
								<tr>
									<td>
										<i class="fas fa-palette"></i>
									</td>
									<td>
										<?= $car->registration_area ?>
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
