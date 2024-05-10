<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= APP_NAME ?> Register</title>
	<link rel="stylesheet" href="<?= assets('vendors/bootstrap/css/bootstrap.min.css') ?>">
</head>

<body>
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">
						<h3 class="text-center">Register</h3>
					</div>
					<div class="card-body">
						<form method="post">
							<div class="mb-3 form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" name="name" id="name" required>
							</div>
							<div class="mb-3 form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="email" id="email" required>
							</div>
							<div class="mb-3 form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password" required>
							</div>
							<div class="text-center">
								<button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
							</div>
							<div class="text-center mt-3">
								<a href="<?= base_url('auth/login') ?>">Kembali ke Login</a>
							</div>
						</form>
					</div>
				</div>
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
