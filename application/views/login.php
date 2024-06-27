<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= APP_NAME ?> Login</title>
	<link rel="stylesheet" href="<?= assets('vendors/bootstrap/css/bootstrap.min.css') ?>">
	<link href="<?php echo base_url('assets/css/login.css'); ?>" rel="stylesheet">
	<link href="<?= assets('vendors/fontawesome/css/all.min.css') ?>" rel="stylesheet" />
</head>

<body>
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-md-4">
				<div class="text-center mb-4" style="color: white;">
					<i class="fas fa-car fa-6x "></i>
					<h1 class="h3 mb-3 mt-2 font-weight-normal text-white">Login</h1>
				</div>
				<form method="post">
					<div class="form-group mb-3">
						<input type="email" class="form-control" name="email" id="email" placeholder="Email" required autofocus>
					</div>
					<div class="form-group mb-3">
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
					</div>
					<div class="text-center">
						<button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Login</button>
					</div>
					<div class="text-center mt-3">
						<a class="link" href="<?= base_url('auth/register') ?>">Register</a>
						<p class="mt-3 cp mb-3 text-center">&copy; Zadde Auto Mobil <?php echo date("Y"); ?></p>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="<?= assets('js/jquery.min.js') ?>"></script>
	<script src="<?= assets('vendors/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= assets('js/sweetalert2.js') ?>"></script>
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