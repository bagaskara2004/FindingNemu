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
				<div class="col-md-10">
					<h4>Overview</h4>
				</div>
				

				<div class="col-md-2 text-right">
				<button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
					Tambah posting
				</button>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-datatable table-responsive pt-0">
				<div id="resault"></div>

				<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Tambah Posting</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Simpan</button>
								<?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>


				<!-- Modal Update Posting -->
				<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="editModalLabel">Edit Posting</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<?php echo form_open_multipart('Admin/Coverview/update_data', ['class' => 'container mt-3', 'id' => 'editForm']); ?>
								<input type="hidden" name="id_posting_edit" id="id_posting_edit" value="">
								<div class="mb-3">
									<label for="judul" class="form-label">Judul</label>
									<input type="text" class="form-control" name="judul" id="judul_edit" required>
								</div>

								<div class="mb-3">
									<label for="tanggal" class="form-label">Tanggal</label>
									<input type="date" class="form-control" name="tanggal" id="tanggal_edit" required>
								</div>

								<div class="mb-3">
									<label for="kategori" class="form-label">Kategori</label>
									<select class="form-select" name="kategori" id="kategori_edit" required>
										<?php foreach ($kategori as $row) : ?>
											<option value="<?php echo $row->id_kategori; ?>"><?php echo $row->kategori; ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="mb-3">
									<label for="status" class="form-label">Status</label>
									<select class="form-select" name="status" id="status_edit" required>
										<option value="0">Hilang</option>
										<option value="1">Ditemukan</option>
									</select>
								</div>

								<div class="mb-3">
									<label for="foto" class="form-label">Foto</label>
									<input type="file" class="form-control" name="foto" id="foto_edit" accept="image/*">
								</div>

								<div class="mb-3">
									<label for="deskripsi" class="form-label">Deskripsi</label>
									<textarea class="form-control" name="deskripsi" id="deskripsi_edit" required></textarea>
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary" onclick="updatePosting()">Simpan</button>
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
	var resaultdata;
	$(document).ready(function() {
		var html = '';

		$.ajax({
			type: 'GET',
			url: "http://localhost/findingNemu/Admin/Coverview/overview",
			success: function(data) {
				console.log(data);
				resaultdata = JSON.parse(data);
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
					if (resaultdata[i].id_konfirmasi == 3) {
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
						html += '<td> <button type="button" class="btn btn-sm btn-danger" onclick="deletePosting(' + resaultdata[i].id_posting + ')">Delete</button> <button type="button" class="btn btn-sm btn-primary" onclick="openEditModal(' + resaultdata[i].id_posting + ')">Update</button> <button type="button" class="btn btn-sm btn-warning btn-detail" data-id="' + resaultdata[i].id_posting + '">Detail</button></td>';
						html += '</tr>';
					}
				}

				html += '</table>';
				console.log(html);

				$("#resault").html(html);
				$('.btn-detail').click(function() {
					var idPosting = $(this).data('id');
					window.location.href = '<?php echo base_url('admin/Coverview/detail/'); ?>' + idPosting;
				});
			}
		});

	});

	function deletePosting(idPosting) {
		Swal.fire({
			title: 'Apakah Anda yakin?',
			text: 'Anda tidak akan dapat mengembalikan ini!',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, hapus!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.isConfirmed) {

				$.ajax({
					type: 'POST',
					url: 'http://localhost/findingNemu/Admin/Coverview/delete_data',
					data: {
						id_posting: idPosting
					},
					success: function(response) {
						var result = JSON.parse(response);
						if (result.status === 'success') {
							Swal.fire({
								icon: 'success',
								title: 'Sukses',
								text: result.message,
								confirmButtonColor: '#3085d6',
								confirmButtonText: 'OK'
							}).then((result) => {
								if (result.isConfirmed || result.dismiss === Swal.DismissReason.backdrop) {
									location.reload();
								}
							});
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Gagal',
								text: 'Gagal menghapus data: ' + result.message,
								confirmButtonColor: '#3085d6',
								confirmButtonText: 'OK'
							});
						}
					},
					error: function() {
						Swal.fire({
							icon: 'error',
							title: 'Gagal',
							text: 'Terjadi kesalahan saat menghubungi server',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'OK'
						});
					}
				});
			}
		});
	}


	function updatePosting() {
		var idPosting = $('#id_posting_edit').val();

		var formData = new FormData($('#editForm')[0]);
		formData.append('id_posting', idPosting);


		$.ajax({
			type: 'POST',
			url: 'http://localhost/findingNemu/Admin/Coverview/update_data',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				var result = JSON.parse(response);
				if (result.status === 'success') {
					Swal.fire({
						icon: 'success',
						title: 'Sukses',
						text: result.message,
						confirmButtonColor: '#3085d6',
						confirmButtonText: 'OK'
					}).then((result) => {

						if (result.isConfirmed || result.dismiss === Swal.DismissReason.backdrop) {
							location.reload();
						}
					});
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Gagal',
						text: 'Gagal mengupdate data: ' + result.message,
						confirmButtonColor: '#3085d6',
						confirmButtonText: 'OK'
					});
				}
			},
			error: function() {
				Swal.fire({
					icon: 'error',
					title: 'Gagal',
					text: 'Gagal mengupdate data: ' + result.message,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'OK'
				});
			}
		});
	}

	function openEditModal(idPosting) {

		var posting = resaultdata.find(post => post.id_posting == idPosting);


		if (posting) {

			$('#id_posting_edit').val(posting.id_posting);
			$('#judul_edit').val(posting.judul);
			$('#tanggal_edit').val(posting.tanggal);
			$('#kategori_edit').val(posting.id_kategori);
			$('#status_edit').val(posting.status);
			$('#deskripsi_edit').val(posting.deskripsi);

			$('#editModal').modal('show');
		} else {
			alert('Posting not found.');
		}
	}
</script>