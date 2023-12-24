<style>
	.img-fixed-size {
		width: 40px;
		height: 40px;
		object-fit: cover;
		border-radius: 50%;
	}
</style>
<main class="content px-3 py-2">
	<div class="container min-vh-100">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h4>Overview</h4>
				</div>
				<div class="col-md-4 ms-auto">
					<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal">
						ADD
					</button>

				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-datatable table-responsive pt-0">
				<div id="resault"></div>
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-3" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog  modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">ADD posting</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">


								<?php echo form_open_multipart('Admin/Coverview/simpan_data', ['class' => 'container mt-3']); ?>

								<div class="mb-3">
									<label for="judul" class="form-label">Judul</label>
									<input type="text" class="form-control" name="judul" required>
								</div>

								<div class="mb-3">
									<label for="tanggal" class="form-label">Tanggal</label>
									<input type="date" class="form-control" name="tanggal" required>
								</div>

								<div class="mb-3">
									<label for="kategori" class="form-label">Kategori</label>
									<select class="form-select" name="kategori" required>
										<?php foreach ($kategori as $row) : ?>
											<option value="<?php echo $row->id_kategori; ?>"><?php echo $row->kategori; ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="mb-3">
									<label for="status" class="form-label">Status</label>
									<select class="form-select" name="status" required>
										<option value="0">Hilang</option>
										<option value="1">Ditemukan</option>
									</select>
								</div>

								<div class="mb-3">
									<label for="foto" class="form-label">Foto</label>
									<input type="file" class="form-control" name="foto" accept="image/*" required>
								</div>

								<div class="mb-3">
									<label for="deskripsi" class="form-label">Deskripsi</label>
									<textarea class="form-control" name="deskripsi" required></textarea>
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Simpan</button>
								<?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script type="text/javascript">
	$(document).ready(function() {

		var html = '';
		$.ajax({
			type: 'GET',
			url: "http://localhost/findingNemu/Admin/Coverview/overview",
			success: function(data) {
				console.log(data);
				var resaultdata = JSON.parse(data);
				html += '<table class="datatables-basic table">';
				html += '<tr>';
				html += '<th></th>';
				html += '<th>Nama</th>';
				html += '<th>Tanggal</th>';
				html += '<th>Jenis</th>';
				html += '<th>Status</th>';
				html += '<th>Action</th>';
				html += '</tr>';

				var base_url = '<?php echo base_url(); ?>';

				for (var i = 0; i < resaultdata.length; i++) {
					html += '<tr>';
					html += '<td><img src="' + base_url + resaultdata[i].foto + '" class="img-fixed-size profile-image-pic" alt="foto"></td>';
					html += '<td>' + resaultdata[i].judul + '</td>';
					html += '<td>' + resaultdata[i].tanggal + '</td>';
					html += '<td>' + resaultdata[i].kategori + '</td>';
					var status = 'Ditemukan';
					if (resaultdata[i].status == 0) {
						status = 'Hilang';
					}
					html += '<td>' + status + '</td>';
					html += '<td> <button type="button" class="btn btn-sm btn-danger">Delete</button> <button type="button" class="btn btn-sm btn-primary">Update</button></td>';
					html += '</tr>';

				}

				html += '</table>';
				console.log(html);
				$("#resault").html(html);
			}
		});


	});
</script>