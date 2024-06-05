<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between align-items-center">
			<h6 class="m-0 font-weight-bold ">Data Permintaan Jual</h6>
		</div>
		<div class="card-body">
		<div class="d-flex">
			<form action="<?= base_url('admin/sell_requests/filtered')?>" method="POST">
				<label for="start_date">Start Date:</label>
				<input type="date" id="start_date" name="start_date" value="<?= set_value('start_date') ?>">
				<label for="end_date">End Date:</label>
				<input type="date" id="end_date" name="end_date" value="<?= set_value('end_date') ?>">
				<button type="submit" class="btn btn-primary ms-2">Filter</button>
			</form>
		<a href="<?= base_url('admin/sell_requests/pdf_filtered/?start_date=' . set_value('start_date') . '&end_date=' . set_value('end_date'))?>" class="btn btn-primary ms-2">Print</a>
		</div>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
							<th style="width: 50px;">No</th>
							<th>Nama</th>
							<th>Email</th>
							<th>No HP</th>
							<th>Merk</th>
							<th>Model</th>
							<th>Tahun</th>
							<th>Status</th>
							<th style="width: 50px;">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$nomor = 1;
						foreach ($data as $x) { ?>
							<tr class="text-center">
								<td><?= $nomor++; ?></td>
								<td><?= $x->user_name; ?></td>
								<td><?= $x->user_email; ?></td>
								<td><?= $x->phone; ?></td>
								<td><?= $x->brand_name; ?></td>
								<td><?= $x->model_name; ?></td>
								<td><?= $x->prod_year; ?></td>
								<td>
									<?php if ($x->status == 'SUCCESS') { ?>
										<span class="badge badge-success">Selesai</span>
									<?php } elseif ($x->status == 'CANCEL') { ?>
										<span class="badge badge-danger">Dibatalkan</span>
									<?php } else { ?>
										<span class="badge badge-warning">Belum Selesai</span>
									<?php } ?>
								</td>
								<td align="center">
									<?php if ($x->status == 'PENDING') { ?>
										<a href="<?= base_url('admin/sell_requests/finish/' . $x->id) ?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin ingin menyelesaikan permintaan jual ini?')">
											<i class="fas fa-check"></i>
										</a>
										<a href="<?= base_url('admin/sell_requests/cancel/' . $x->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin membatalkan permintaan jual ini?')">
											<i class="fas fa-times"></i>
										</a>
									<?php } ?>
									<a href="https://wa.me/<?= $x->phone; ?>" class="btn btn-primary btn-sm" target="_blank">
										<i class="fab fa-whatsapp"></i>
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
