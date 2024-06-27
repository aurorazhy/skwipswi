<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between align-items-center">
			<h6 class="m-0 font-weight-bold ">Data Seri</h6>
			<a href="<?= base_url('admin/models/add') ?>" class="btn btn-primary"><i class="fa fa-plus fs-5" aria-hidden="true"></i></a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
							<th style="width: 50px;">No</th>
							<th>Nama Brand</th>
							<!-- <th>Kode</th> -->
							<th>Nama Seri</th>
							<th style="width: 50px;">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$nomor = 1;
						foreach ($data as $x) { ?>
							<tr class="text-center">
								<td><?= $nomor++; ?></td>
								<td><?= $x->brand_name; ?></td>
								<!-- <td><?= $x->code; ?></td> -->
								<td><?= $x->name; ?></td>
								<td align="center">
									<a href="<?= base_url('admin/models/edit/') . $x->id; ?>" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a href="<?= base_url('admin/models/delete/') . $x->id; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
