<div class="container-fluid">
	<div class="card-body">
		<div class="card shadow mb-4">
			<div class="card-body text-center">
				<div class="row">
					<div class="col-8">
						<!-- edit profile -->
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="container-fluid">
										<?= validation_errors() ?>
										<form method="POST" enctype="multipart/form-data">
											<table class="table">
												<tr>
													<td width=20%>Nama</td>
													<td><input type="text" name="name" class="form-control" required placeholder="Nama" value="<?= $data->name ?>"></td>
												</tr>
												<tr>
													<td width=20%>Email</td>
													<td><input type="email" name="email" class="form-control" required placeholder="Email" value="<?= $data->email ?>"></td>
												</tr>
												<tr>
													<td width=20%>Password</td>
													<td><input type="password" name="password" class="form-control" placeholder="Password"></td>
												</tr>
												<tr>
													<td width=20%>Foto</td>
													<td>
														<input type="file" name="img_link" class="form-control">
													</td>
												</tr>
											</table>
											<div class="text-center mt-5">
												<button class="btn btn-success" name="update">Simpan</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-4">
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Profile</h6>
							</div>
							<div class="card-body">
								<img src="<?= assets('img/admins/') . ($data->img_link ?? "default.png") ?>" class="mb-3" width="30%">
								<h3><?= $data->name ?></h3>
								<p><?= $data->email ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>