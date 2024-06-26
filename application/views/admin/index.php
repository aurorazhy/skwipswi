<div class="container-fluid">
	<div class="card-body">
		<div class="card shadow mb-4">
			<div class="card-body text-center">
				<div class="row">
					<div class="col-3">
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Pengguna</h6>
							</div>
							<div class="card-body">
								<h1><?= count($users) ?></h1>
							</div>
						</div>
					</div>
					<div class="col-3">
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Katalog Aktif</h6>
							</div>
							<div class="card-body">
								<h1><?= count($katalog_aktif) ?></h1>
							</div>
						</div>
					</div>
					<div class="col-3">
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Total Katalog</h6>
							</div>
							<div class="card-body">
								<h1><?= count($katalog) ?></h1>
							</div>
						</div>
					</div>
					<div class="col-3">
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Penjualan Perbulan</h6>
							</div>
							<div class="card-body">
								<h1><?= count($penjualan_perbulan) ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">5 Penjualan Terakhir</h6>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" width="100%" cellspacing="0">
										<thead>
											<tr class="text-center">
												<th style="width: 50px;">No</th>
												<th>Nama</th>
												<th>Email</th>
												<th>No HP</th>
												<th>Mobil</th>
												<th>Tanggal</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$nomor = 1;
											foreach ($penjualan_terakhir as $x) { ?>
												<tr class="text-center">
													<td><?= $nomor++; ?></td>
													<td><?= $x->user_name; ?></td>
													<td><?= $x->email; ?></td>
													<td><?= $x->phone; ?></td>
													<td><?= $x->brand_name; ?> || <?= $x->series_name; ?></td>
													<td><?= $x->buy_date; ?></td>
													<td>
														<?php if ($x->status == 'SUCCESS') { ?>
															<span class="badge badge-success">Selesai</span>
														<?php } elseif ($x->status == 'CANCEL') { ?>
															<span class="badge badge-danger">Dibatalkan</span>
														<?php } else { ?>
															<span class="badge badge-warning">Belum Selesai</span>
														<?php } ?>
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
