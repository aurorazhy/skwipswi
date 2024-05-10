<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between align-items-center">
			<h6 class="m-0 font-weight-bold ">Transaksi</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col">
					<form action="<?= base_url('admin/transactions'); ?>" method="POST">
						<div class="input-group mb-3">
							<input type="text" class="form-control daterangepick" name="tanggal" placeholder="Filter tanggal">
							<button class="btn btn-primary" type="submit">Filter</button>
						</div>
					</form>
				</div>
				<div class="col-auto">
					<a href="<?= base_url('admin/transactions/print?date=' . $this->input->post('tanggal')); ?>" target="_blank" class="btn btn-warning">
						<i class="fas fa-print"></i>
					</a>
				</div>
				<div class="col-auto">
					<a href="<?= base_url('admin/transactions/pdf?date=' . $this->input->post('tanggal')); ?>" class="btn btn-secondary text-white">
						<i class="fa-solid fa-file-pdf"></i>
					</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
							<th style="width: 50px;">No</th>
							<th>Tanggal - Waktu</th>
							<th>Nama Pelanggan</th>
							<th>Total</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$nomor = 1;
						foreach ($data as $x) { ?>
							<tr class="text-center">
								<td><?= $nomor++; ?></td>
								<td><?= date('d-m-Y H:i:s', strtotime($x->tanggal)); ?></td>
								<td><?= $x->nama_user; ?></td>
								<td>Rp. <?= number_format($x->total, 0, ',', '.'); ?></td>
								<td>
									<?php if ($x->status == "pending") { ?>
										<span class="badge bg-danger text-white">Belum Dibayar</span> <br><br>
										<a href="<?= base_url('admin/transactions/confirm/' . $x->id); ?>" class="btn btn-success">
											Konfirmasi <i class="fas fa-check"></i>
										</a>
										<a href="<?= base_url('admin/transactions/cancel/' . $x->id); ?>" class="btn btn-danger">
											Batalkan <i class="fas fa-times"></i>
										</a>
									<?php } elseif ($x->status == "paid") { ?>
										<span class="badge bg-success text-white">Dibayar</span>
									<?php } elseif ($x->status == "cancel") { ?>
										<span class="badge bg-secondary text-white">Dibatalkan</span>
									<?php } ?>
								</td>
								<td>
									<a href="<?= base_url('admin/transactions/detail/' . $x->id); ?>" class="btn btn-primary fs-5">
										<i class="fas fa-info-circle"></i>
									</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
