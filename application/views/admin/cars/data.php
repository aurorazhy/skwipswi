<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between align-items-center">
			<h6 class="m-0 font-weight-bold ">Data Mobil</h6>
			<a href="<?= base_url('admin/cars/add') ?>" class="btn btn-primary"><i class="fa fa-plus fs-5" aria-hidden="true"></i></a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
							<th style="width: 50px;">No</th>
							<th>Gambar</th>
							<th>Nama</th>
							<th>Plat</th>
							<th>Transmisi</th>
							<th>Fuel</th>
							<th>Pajak Terakhir</th>
							<th>Tahun</th>
							<th>Warna</th>
							<th>Jumlah Kilometer</th>
							<th>Area Registrasi</th>
							<th>CC Engine</th>
							<th>Harga</th>
							<th>Terjual</th>
							<th style="width: 50px;">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$nomor = 1;
						foreach ($data as $x) { ?>
							<tr class="text-center">
								<td><?= $nomor++; ?></td>
								<td><img src="<?= assets('img/cars/') . $x->img_link; ?>" alt="<?= $x->name; ?>" class="img-fluid rounded-0 my-2"></td>
								<td><?= $x->name; ?></td>
								<td><?= $x->number_plate; ?></td>
								<td><?= $x->transmission; ?></td>
								<td><?= $x->fuel; ?></td>
								<td><?= $x->tax_exp_date; ?></td>
								<td><?= $x->year; ?></td>
								<td><?= $x->color; ?></td>
								<td><?= $x->kilometers; ?></td>
								<td><?= $x->registration_area; ?></td>
								<td><?= $x->cc_engine; ?></td>
								<td><?= $x->price; ?></td>
								<td>
									<?php if ($x->is_sold == 1) { ?>
										<span class="badge badge-success">Terjual</span>
									<?php } else { ?>
										<span class="badge badge-danger">Belum Terjual</span>
									<?php } ?>
								</td>
								<td align="center">
									<a href="<?= base_url('admin/cars/edit/') . $x->id; ?>" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a href="<?= base_url('admin/cars/delete/') . $x->id; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
