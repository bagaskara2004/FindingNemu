	<!--Main Content-->
	<main class="content px-3 py-2">
		<!-- DataTable -->
		<div class="container min-vh-100">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h4>Overview</h4>
					</div>
					<div class="col-md-4 ms-auto">
						<button type="button" class="btn btn-sm btn-warning">Add</button>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-datatable table-responsive pt-0">

					<table class="datatables-basic table">
						<thead>
							<tr>
								<th></th>
								<th></th>
								<th>Nama</th>
								<th>Tanggal</th>
								<th>Jenis</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($postings as $posting) : ?>
								<tr>
									<td></td>
									<td> <img src="<?php echo base_url($posting['foto']); ?>" style="width: 30px;" alt="Foto Postingan"></td>
									<td>
										<h6><?php echo $posting['judul']; ?></h5>
									</td>
									<td>
										<h6><?php echo $posting['tanggal']; ?></h6>
									</td>
									<td>
										<h6><?= $posting['kategori'] ?></h6>
									</td>
									<td>
										<p>hilang</p>
									</td>
									<td>
										<button type="button" class="btn btn-sm btn-danger">Delete</button>
										<button type="button" class="btn btn-sm btn-primary">Update</button>
										<a href="<?= site_url('Admin/Coverview/detail/' . $posting['id_posting']); ?>" class="btn btn-sm btn-warning">Detail</a>

									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</main>