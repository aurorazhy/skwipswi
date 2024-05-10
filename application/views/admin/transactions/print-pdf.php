<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Print Laporan Transaksi</title>
	<link rel="stylesheet" href="<?= assets('vendors/bootstrap/css/bootstrap.min.css') ?>" />
</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h3 class="text-center">Laporan Transaksi</h3>
				<table class="table table-bordered text-center">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Nama Pelanggan</th>
							<th>Status</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						$total = 0;
						foreach ($transactions as $transaction) : ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= date('d-m-Y', strtotime($transaction->tanggal)) ?></td>
								<td><?= $transaction->nama_user ?></td>
								<td>
									<?php if ($transaction->status == 'pending') : ?>
										<span class="badge bg-danger text-white">Belum Dibayar</span>
									<?php elseif ($transaction->status == 'paid') : ?>
										<span class="badge bg-success text-white">Dibayar</span>
									<?php elseif ($transaction->status == 'cancel') : ?>
										<span class="badge bg-secondary text-white">Dibatalkan</span>
									<?php endif; ?>
								<td>Rp. <?= number_format($transaction->total, 0, ',', '.') ?></td>
								</td>
							</tr>
						<?php
							$total += $transaction->total;
						endforeach; ?>
						<tr class="fw-bold">
							<td colspan="4" class="text-end">Total</td>
							<td>Rp. <?= number_format($total, 0, ',', '.') ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script>
		window.print();
		window.onafterprint = function() {
			window.close();
		}
	</script>
</body>

</html>
