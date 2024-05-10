<section class="content-section full-height-section py-5" style="background-color: #f1f3ff">
	<div class="container">
		<div class="row bg-light rounded p-4 align-items-stretch">
			<div class="col">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Aktivitas</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($activities as $activity) : ?>
							<tr>
								<td><?= $activity ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
