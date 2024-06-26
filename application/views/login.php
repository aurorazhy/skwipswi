<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= APP_NAME ?> Login</title>
	<link rel="stylesheet" href="<?= assets('vendors/bootstrap/css/bootstrap.min.css') ?>">
</head>

<body>
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-md-4">
			<form class="form-signin" method="post" action="<?php echo site_url('Login/masuk'); ?>">
				<div class="text-center mb-4">
					<svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-briefcase-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"/>
					<path fill-rule="evenodd" d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5v1.384l-7.614 2.03a1.5 1.5 0 0 1-.772 0L0 5.884V4.5zm5-2A1.5 1.5 0 0 1 6.5 1h3A1.5 1.5 0 0 1 11 2.5V3h-1v-.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V3H5v-.5z"/>
					</svg>
					<h1 class="h3 mb-3 font-weight-normal">Login</h1>
				</div>

				<div class="form-label-group">
					<input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
					<br>
				</div>

				<div class="form-label-group">
					<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
					<br>
				</div>

				<div class="text-center">
								<button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
							</div>
				<div class="text-center mt-3">
								<a href="<?= base_url('auth/register') ?>">Register</a>
							</div>
				<p class="mt-5 mb-3 text-muted text-center">&copy; Zadde Auto Mobil <?php echo date("Y"); ?></p>
			</form>
				
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
