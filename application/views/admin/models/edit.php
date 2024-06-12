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
												Model
											</div>
											<div class="card-body">
												<div class="row">
													<div class="container-fluid">
														<?= validation_errors() ?>
														<form method="POST" enctype="multipart/form-data">
															<table class="table">
																<tr>
																	<td width=20%>Pilih Merk</td>
																	<td>
																		<select name="brand_id" class="form-control" required>
																			<option value="" disabled selected>Pilih Merk</option>
																			<?php foreach ($brands as $brand) : ?>
																				<option value="<?= $brand->id ?>" <?= $brand->id == $data->brand_id ? 'selected' : '' ?>><?= $brand->name ?></option>
																			<?php endforeach; ?>
																		</select>
																	</td>
																</tr>
																<!-- <tr>
																	<td width=20%>Kode</td>
																	<td><input type="text" name="code" class="form-control" required placeholder="Kode" value="<?= $data->code; ?>"></td>
																</tr> -->
																<tr>
																	<td width=20%>Nama Model</td>
																	<td><input type="text" name="name" class="form-control" required placeholder="Nama Model" value="<?= $data->name; ?>"></td>
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
