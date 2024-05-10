<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?= APP_NAME ?></title>

	<link href="<?= assets('vendors/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" />
	<link href="<?= assets('vendors/fontawesome/css/all.min.css') ?>" rel="stylesheet" />
	<link href="<?= assets('css/style.css') ?>" rel="stylesheet" />

	<style>
		.logo {
			max-width: 100px;
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
			font-size: 2rem;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
		<div class="container">
			<a class="navbar-brand logo" href="<?= base_url() ?>">
				<img src="<?= assets('img/logo.png') ?>" alt="Logo" class="img-fluid rounded-circle">
				<span class="ms-2">
					<?= APP_NAME ?>
				</span>
			</a>
			<button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"><i class="fas fa-bars"></i> </span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
					<?php if (is_logged_in()) : ?>
						<li class="nav-item me-3">
							<a class="btn btn-warning rounded" href="<?= base_url('history') ?>">Riwayat Aktivitas</a>
						</li>
					<?php endif; ?>
					<li class="nav-item me-3">
						<?php if (!is_logged_in()) : ?>
							<a class="btn btn-primary rounded" href="<?= base_url('auth/login') ?>">Jual Mobil</a>
						<?php else : ?>
							<button type="button" class="btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#sellCarModal">
								Jual Mobil
							</button>
						<?php endif; ?>
					</li>
					<li class="nav-item">
						<?php if (!is_logged_in()) : ?>
							<a class="btn btn-secondary" href="<?= base_url('auth/login') ?>">Login</a>
						<?php else : ?>
							<a class="btn btn-secondary" href="<?= base_url('auth/logout') ?>">Logout</a>
						<?php endif; ?>
					</li>
				</ul>
			</div>
		</div>
	</nav>
