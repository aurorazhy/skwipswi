<?php
$payment_options = $this->db->get('payment_options')->result();
$brands = $this->db->get('brands')->result();
$models = $this->db->get('series')->result();
?>
<div class="container my-5">
	<!-- Footer -->
	<footer>
		<div class="container p-4 pb-0">
			<!-- Section: Links -->
			<section class="">
				<!--Grid row-->
				<div class="row">
					<!-- Grid column -->
					<div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
						<h6 class="text-uppercase mb-4 font-weight-bold">
							Jalan X
						</h6>
						<p>zaddeautomobil@gmail.com</p>
						<p>081-233-334-808</p>
					</div>
					<!-- Grid column -->

					<hr class="w-100 clearfix d-md-none" />

					<!-- Grid column -->
					<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
						<h6 class="text-uppercase mb-4 font-weight-bold">
							Our services
						</h6>
						<p>
							<a class="text-decoration-none" href="<?= base_url("#cars") ?>">Beli</a>
						</p>
						<p>
							<button type="button" class="btn btn-link text-decoration-none p-0" data-bs-toggle="modal" data-bs-target="#sellCarModal">
								Jual
							</button>
						</p>
					</div>
					<hr class="w-100 clearfix d-md-none" />
					<hr class="w-100 clearfix d-md-none" />
					<!-- Grid column -->
					<div class="col-md-3 col-lg-2 col-xl-3 mx-auto mt-3">
						<h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>
						<a class="btn btn-primary btn-floating m-1" style="background-color: #0d28a6" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
						<a class="btn btn-primary btn-floating m-1" style="background-color: #0d28a6" href="#!" role="button"><i class="fab fa-instagram"></i></a>
						<a class="btn btn-primary btn-floating m-1" style="background-color: #0d28a6" href="#!" role="button"><i class="fab fa-x-twitter"></i></a>
						<a class="btn btn-primary btn-floating m-1" style="background-color: #0d28a6" href="#!" role="button"><i class="fab fa-google"></i></a>
					</div>
					<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
						<h6 class="text-uppercase mb-4 font-weight-bold">
							Copyright &copy; 2024
						</h6>
					</div>
				</div>

				<!-- Grid column -->
			</section>
		</div>
	</footer>
</div>

<!-- modal -->
<div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Buat Janji Temu</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('cars/submit_appointment') ?>" method="POST">
					<div class="mb-3">
						<label for="phone" class="form-label">No HP</label>
						<input type="text" class="form-control" id="phone" name="phone" required />
					</div>
					<div class="mb-3">
						<label for="date" class="form-label">Tanggal & Jam</label>
						<input type="datetime-local" class="form-control" id="date" name="date" required />
					</div>
					<input type="hidden" name="car_bpkb_number" value="<?= @$car->bpkb_number ?>" />
					<div class="text-center">
						<button type="submit" class="btn btn-primary">Buat Janji Temu</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="buyCarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Beli Mobil</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('cars/submit_buy_car') ?>" method="POST">
					<div class="mb-3">
						<label for="phone" class="form-label">No HP</label>
						<input type="text" class="form-control" id="phone" name="phone" required />
					</div>
					<div class="mb-3">
						<label for="payment_option" class="form-label">Metode Pembayaran</label>
						<select class="form-select" id="payment_option" name="payment_option" required>
							<option value="" disabled selected>Pilih Metode Pembayaran</option>
							<?php foreach (($payment_options ?? []) as $payment_option) : ?>
								<option value="<?= $payment_option->id ?>"><?= $payment_option->name ?> | <?= $payment_option->number ?> | <?= $payment_option->type ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<input type="hidden" name="car_id" value="<?= @$car->id ?>" />
					<div class="text-center">
						<button type="submit" class="btn btn-primary">Lanjutkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="sellCarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Jual Mobil</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('cars/submit_sell_car') ?>" method="POST">
					<div class="mb-3">
						<label for="phone" class="form-label">No HP</label>
						<input type="text" class="form-control" id="phone" name="phone" required />
					</div>
					<div class="mb-3">
						<label for="brand_id" class="form-label">Brand</label>
						<select class="form-select" id="brand_id" name="brand_id" required>
							<option value="" disabled selected>Pilih Brand</option>
							<?php foreach (($brands ?? []) as $brand) : ?>
								<option value="<?= $brand->id ?>"><?= $brand->name ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="mb-3">
						<label for="model_id" class="form-label">Model</label>
						<select class="form-select" id="model_id" name="model_id" required>
							<option value="" disabled selected>Pilih Model</option>
							<?php foreach (($models ?? []) as $model) : ?>
								<option value="<?= $model->id ?>"><?= $model->name ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="mb-3">
						<label for="prod_year" class="form-label">Tahun Produksi</label>
						<input type="number" class="form-control" id="prod_year" name="prod_year" required />
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary">Lanjutkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="<?= assets('js/jquery.min.js') ?>"></script>
<script src="<?= assets('vendors/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= assets('vendors/fontawesome/js/all.min.js') ?>"></script>
<script src="<?= assets('js/sweetalert2.js') ?>"></script>
<script src="<?= assets('js/script.js') ?>"></script>
<?php if ($alert = $this->session->flashdata('success')) : ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Success',
			text: `<?= $alert ?>`,
			showConfirmButton: true,
			timer: 3000
		});
	</script>
<?php endif; ?>
<?php if ($alert = $this->session->flashdata('error')) : ?>
	<script>
		Swal.fire({
			icon: 'error',
			title: 'Error',
			text: `<?= $alert ?>`,
			showConfirmButton: true,
			timer: 3000
		});
	</script>
<?php endif; ?>
</body>

</html>
