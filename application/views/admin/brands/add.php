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
											Brand
											</div>
											<div class="card-body">
												<div class="row">
													<div class="container-fluid">
														<?= validation_errors() ?>
														<form method="POST" enctype="multipart/form-data">
															<table class="table">
																<tr>
																	<td width=20%>Nama Brand</td>
																	<td><input type="text" name="name" class="form-control" required placeholder="Nama Merk"></td>
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
