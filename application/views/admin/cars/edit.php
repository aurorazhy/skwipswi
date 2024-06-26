<body class="bg-gradient-success">
	<div class="mbr-slider slide carousel" data-keyboard="false" data-ride="carousel" data-interval="2000" data-pause="true">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="card o-hidden border-0 shadow-lg my-5 ">
						<div class="card-body p-0">
							<div class="row">
								<div class="col-lg">
									<div class="p-5">
										<!-- Page Heading -->
										<div class="card">
											<div class="card-header">
												Mobil
											</div>
											<div class="card-body">
												<div class="row">
													<div class="container-fluid">
														<?= validation_errors() ?>
														<form method="POST" enctype="multipart/form-data">
															<table class="table">
																<tr>
																	<td width=20%>Nomor BPKB</td>
																	<td><input type="text" name="name" class="form-control" required placeholder="Nomor BPKB" value="<?= $data->name ?>"></td>
																</tr>
																<!-- <tr>
																	<td width=20%>Merk</td>
																	<td>
																		<select name="brand_id" class="form-control" required>
																			<option value="" disabled selected>Pilih Merk</option>
																			<?php foreach ($brands as $brand) : ?>
																				<option value="<?= $brand->id ?>" <?= ($brand->id == $data->brand_id) ? 'selected' : '' ?>><?= $brand->name ?></option>
																			<?php endforeach; ?>
																		</select>
																	</td>
																</tr> -->
																<tr>
																	<td width=20%>Model</td>
																	<td>
																		<select name="model_id" class="form-control" required>
																			<option value="" disabled selected>Pilih Model</option>
																			<?php foreach ($models as $model) : ?>
																				<option value="<?= $model->id ?>" <?= ($model->id == $data->model_id) ? 'selected' : '' ?>><?= $model->name ?></option>
																			<?php endforeach; ?>
																		</select>
																	</td>
																</tr>
																<tr>
																	<td width=20%>Plat Nomor</td>
																	<td><input type="text" name="number_plate" class="form-control" required placeholder="Plat Nomor" value="<?= $data->number_plate ?>"></td>
																</tr>
																<tr>
																	<td width=20%>Transmisi</td>
																	<td><input type="text" name="transmission" class="form-control" required placeholder="Transmisi" value="<?= $data->transmission ?>"></td>
																</tr>
																<tr>
																	<td width=20%>Bahan Bakar</td>
																	<td><input type="text" name="fuel" class="form-control" required placeholder="Bahan Bakar" value="<?= $data->fuel ?>"></td>
																</tr>
																<tr>
																	<td width=20%>Pajak Terakhir</td>
																	<td><input type="date" name="tax_exp_date" class="form-control" required value="<?= $data->tax_exp_date ?>"></td>
																</tr>
																<tr>
																	<td width=20%>Tahun</td>
																	<td><input type="number" name="year" class="form-control" required placeholder="Tahun" value="<?= $data->year ?>"></td>
																</tr>
																<tr>
																	<td width=20%>Warna</td>
																	<td><input type="text" name="color" class="form-control" required placeholder="Warna" value="<?= $data->color ?>"></td>
																</tr>
																<tr>
																	<td width=20%>Jumlah Kilometer</td>
																	<td><input type="number" name="kilometers" class="form-control" required placeholder="Jumlah Kilometer" value="<?= $data->kilometers ?>"></td>
																</tr>
																<tr>
																	<td width=20%>Area Registrasi</td>
																	<td><input type="text" name="registration_area" class="form-control" required placeholder="Area Registrasi" value="<?= $data->registration_area ?>"></td>
																</tr>
																<tr>
																	<td width=20%>CC Engine</td>
																	<td><input type="number" name="cc_engine" class="form-control" required placeholder="CC Engine" value="<?= $data->cc_engine ?>"></td>
																</tr>
																<tr>
																	<td width=20%>Harga</td>
																	<td><input type="number" name="price" class="form-control" required placeholder="Harga" value="<?= $data->price ?>"></td>
																</tr>
																<tr>
																	<td width=20%>Deskripsi</td>
																	<td><textarea name="description" class="form-control" required placeholder="Deskripsi"><?= $data->description ?></textarea></td>
																</tr>
																<tr>
																	<td width=20%>Gambar</td>
																	<td>
																		<input type="file" name="img_link" class="form-control">
																	</td>
																</tr>
																<tr>
																	<td width=20%>Terjual</td>
																	<td>
																		<select name="is_sold" class="form-control" required>
																			<option value="" disabled selected>Pilih Status</option>
																			<option value="1" <?= ($data->is_sold == 1) ? 'selected' : '' ?>>Terjual</option>
																			<option value="0" <?= ($data->is_sold == 0) ? 'selected' : '' ?>>Belum Terjual</option>
																		</select>
																	</td>
																</tr>
															</table>
															<div class="text-center mt-5">
																<button class="btn btn-success">Simpan</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
