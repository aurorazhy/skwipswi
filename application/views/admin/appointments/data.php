<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between align-items-center">
			<h6 class="m-0 font-weight-bold ">Janji Temu</h6>
		</div>
		<div class="card-body">
		<div class="d-flex">
				<form action="<?= base_url('admin/appointments/filtered')?>" method="post">
						<label for="start_date">Start Date:</label>
						<input type="date" name="start_date">
						<label for="end_date">End Date:</label>
						<input type="date" name="end_date">
						<button type="submit" class="btn btn-primary ms-2">Filter</button>
					</form>
				<a href="<?= base_url('admin/appointments/pdf')?>" class="btn btn-primary ms-2">Print</a>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
							<th style="width: 50px;">No</th>
							<th>Nama</th>
							<th>Email</th>
							<th>No HP</th>
							<th>Mobil</th>
							<th>Tanggal Waktu Temu</th>
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
								<td><?= $x->car_name; ?></td>
								<td><?= date('d/m/Y', strtotime($x->meet_date)); ?> <?= date('H:i', strtotime($x->meet_time)); ?></td>
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
										<a href="<?= base_url('admin/appointments/finish/' . $x->id) ?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin ingin menyelesaikan janji temu ini?')">
											<i class="fas fa-check"></i>
										</a>
										<a href="<?= base_url('admin/appointments/cancel/' . $x->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin membatalkan janji temu ini?')">
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
