<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between align-items-center">
			<h6 class="m-0 font-weight-bold ">Transaksi</h6>
			<a href="<?= base_url('admin/transactions'); ?>" class="btn btn-primary">
				<i class="fas fa-arrow-left"></i> Kembali
			</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
							<th style="width: 50px;">No</th>
							<th>Gambar</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$nomor = 1;
						$total = 0;
						foreach ($items as $x) { ?>
							<tr class="text-center">
								<td><?= $nomor++; ?></td>
								<td>
									<img src="<?= assets('images/products/' . $x->gambar); ?>" alt="<?= $x->nama_barang; ?>" class="img-fluid" style="max-width: 100px;">
								</td>
								<td><?= $x->nama_barang; ?></td>
								<td>Rp. <?= number_format($x->harga - ($x->harga * $x->persen_diskon / 100), 0, ',', '.'); ?></td>
								<td><?= $x->jumlah; ?></td>
								<td><b>Rp. <?= number_format($x->harga * $x->jumlah - ($x->harga * $x->jumlah * $x->persen_diskon / 100), 0, ',', '.'); ?></b></td>
							</tr>
						<?php
							$total += $x->harga * $x->jumlah - ($x->harga * $x->jumlah * $x->persen_diskon / 100);
						} ?>
						<tr class="text-center">
							<td colspan="5" class="text-end"><b>Total</b></td>
							<td><b>Rp. <?= number_format($total, 0, ',', '.'); ?></b></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
