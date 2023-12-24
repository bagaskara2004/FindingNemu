
			<!--Main Content-->
			<main class="content px-3 py-2">
				<!-- DataTable -->
				<div class="container min-vh-100">
					<div class="container">
						<div class="row">
							<div class="col-md-4">
								<h4>User</h4>
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
										<th>Username</th>
										<th>Email</th>
										<th>No Tlp</th>
										
										
									</tr>
								</thead>
								<tbody>
									<?php foreach ($user as $users) : ?>
										<tr>
											<td></td>
											<td> <img src="<?php echo base_url($users['foto']); ?>" style="width: 30px;" alt="Foto Postingan"></td>
											<td>
												<h6><?php echo $users['username']; ?></h5>
											</td>
											<td>
												<h6><?php echo $users['email']; ?></h6>
											</td>
											<td>
												<h6><?php echo $users['telp']; ?>
											</td>
											<td>
												<button type="button" class="btn btn-sm btn-danger">Delete</button>
												<button type="button" class="btn btn-sm btn-primary">Update</button>
												

											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</main>
			