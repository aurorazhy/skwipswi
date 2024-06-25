<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= APP_NAME ?> Admin</title>
	<link rel="stylesheet" href="<?= assets('vendors/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= assets('vendors/fontawesome/css/all.min.css') ?>">
	<link rel="stylesheet" href="<?= assets('skydash/vendors/feather/feather.css') ?>">
	<link rel="stylesheet" href="<?= assets('skydash/vendors/ti-icons/css/themify-icons.css') ?>">
	<link rel="stylesheet" href="<?= assets('skydash/vendors/css/vendor.bundle.base.css') ?>">
	<link rel="stylesheet" href="<?= assets('skydash/vendors/mdi/css/materialdesignicons.min.css') ?>">
	<link href="<?= assets('vendors/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?= assets('skydash/css/vertical-layout-light/style.css') ?>">
	<link rel="shortcut icon" href="<?= assets('skydash/images/favicon.png') ?>" />
</head>

<body>
	<div class="container-scroller">
		<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
			<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
				<a class="navbar-brand brand-logo text-center" href="<?= base_url('admin') ?>"> <?= APP_NAME ?></a>
				<a class="navbar-brand brand-logo-mini" href="<?= base_url('admin') ?>">
					<img src="<?= assets('img/logo.png') ?>" alt="Logo" class="img-fluid rounded-circle">
				</a>
			</div>
			<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
				<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
					<span class="icon-menu"></span>
				</button>
				<ul class="navbar-nav navbar-nav-right">
					<li class="nav-item nav-profile dropdown">
						<a class="nav-link dropdown-toggle fs-4" href="#" data-toggle="dropdown" id="profileDropdown">
							<div class="d-flex align-items-center">
								<span class="profile-text"><?= $this->session->userdata('admin')->name; ?></span>
								<img class="img-xs rounded-circle ms-2" src="<?= assets('img/admins/' . ($this->session->userdata('admin')->img_link ?? "default.png")) ?>" alt="Profile image">
							</div>
						</a>

						<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
							<a class="dropdown-item" href="<?= base_url('admin/profile') ?>">
								<i class="ti-user text-primary"></i>
								Profile
							</a>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
								<i class="ti-power-off text-primary"></i>
								Logout
							</a>
						</div>
					</li>
				</ul>
				<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
					<span class="icon-menu"></span>
				</button>
			</div>
		</nav>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="theme-setting-wrapper">
				<div id="settings-trigger"><i class="ti-settings"></i></div>
				<div id="theme-settings" class="settings-panel">
					<i class="settings-close ti-close"></i>
					<p class="settings-heading">Warna Sidebar</p>
					<div class="sidebar-bg-options selected" id="sidebar-light-theme">
						<div class="img-ss rounded-circle bg-light border mr-3"></div>Terang
					</div>
					<div class="sidebar-bg-options" id="sidebar-dark-theme">
						<div class="img-ss rounded-circle bg-dark border mr-3"></div>Gelap
					</div>
					<p class="settings-heading mt-2">Warna Header</p>
					<div class="color-tiles mx-0 px-4">
						<div class="tiles success"></div>
						<div class="tiles warning"></div>
						<div class="tiles danger"></div>
						<div class="tiles info"></div>
						<div class="tiles dark"></div>
						<div class="tiles default"></div>
					</div>
				</div>
			</div>

			<nav class="sidebar sidebar-offcanvas" id="sidebar">
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('admin') ?>">
							<i class="icon-grid menu-icon"></i>
							<span class="menu-title">Dashboard</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="collapse" href="#merk" aria-expanded="false" aria-controls="merk">
							<i class="mdi mdi-car menu-icon"></i>
							<span class="menu-title">Mobil</span>
							<i class="menu-arrow"></i>
						</a>
						<div class="collapse" id="merk">
							<ul class="nav flex-column sub-menu">
								<li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/brands') ?>">Brand</a></li>
								<li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/models') ?>">Model</a></li>
								<li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/cars') ?>">Mobil</a></li>
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('admin/appointments') ?>">
							<i class="mdi mdi-hand menu-icon"></i>
							<span class="menu-title">Janji Temu</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('admin/sale_histories') ?>">
							<i class="mdi mdi-history menu-icon"></i>
							<span class="menu-title">Riwayat Pembelian</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('admin/sell_requests') ?>">
							<i class="mdi mdi-currency-usd menu-icon"></i>
							<span class="menu-title">Permintaan Jual</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('admin/payment_options') ?>">
							<i class="mdi mdi-cash-multiple menu-icon"></i>
							<span class="menu-title">Opsi Bayar</span>
						</a>
					</li>
				</ul>
			</nav>

			<div class="main-panel">
				<div class="content-wrapper">