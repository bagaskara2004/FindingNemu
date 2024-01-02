<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="<?=base_url('asset/css/style.css')?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
	<script src="<?= base_url('asset/jquery/jquery-3.7.1.min.js')?>"></script>
</head>
<style>
	.table-status table{
		border-collapse: collapse;
		width: 100%;
		text-align: center;
		color: white;
		background-color: #2090ff;
		border: none;
		outline: none;

	}

	.card{
		border: none;
	}


	.profile-top{
		margin-top: 50px;
	}

	.table-status{
		margin-top: 100px;
	}

	.input-profile{
		margin-top: 40px;
	}

	.table-status thead{
		background-color: #2090ff;
	}

	.profile-preview{
		text-align: center;
		align-content: center;
		margin-bottom: 30px;
	}

	footer{
		padding-top: 160px;
	}

	.alert{
		margin-top: 50px;
		text-align: center;
		border: none;
		background: white;
	}

	.green {
		color: green;
	}

	.red{
		color: red;
	}

	.yellow{
		color: yellow;
	}

</style>
<body>
<div class="container mt-5">
<div class="notification">
	<?php
		$pesan = $this -> session -> flashdata('pesan');
		if ($pesan == "") {
			echo "";
		}
		else {
		?>
			<div class="form-alert">
				<div class="alert alert-danger alert-dismissible" id="notif-alert">
					<?php echo $pesan; ?>
				</div>
			</div>
		<?php } ?>
</div>
	<div class="row">
		<div class="row mt-3">
			<div class="profile-top">
				<div class="d-flex align-items-center">
					<a class="nav-link button mx-auto" href="#" data-bs-toggle="dropdown">
						<img src="<?= base_url($this->session->userdata('foto')) ?>" class="img-fluid profile-image-pic rounded-circle" width="150px" alt="Profile" id="pfp">
					</a>
					<div class="dropdown-menu dropdown-menu-end">
						<button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModal">
							Edit Profile
						</button>
						<a href="<?=base_url('Cauth/logout')?>" class="dropdown-item">Logout</a>
					</div>
					<!--Modal Profile Changes-->
					<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="exampleModalLabel">Ganti Profile</h1>
								</div>
								<div class="modal-body">
									<label for="imagePreview">Preview</label>
									<div class="profile-preview">
										<img src=""
											 class="img-fluid profile-image-pic rounded-circle"
											 id="imagePreview"
											 width="100px"
											 alt=""
										>
									</div>
									<!--Profile Update-->
									<?php echo form_open_multipart('Cuserprofile/uploadprofile', ['class' => 'container mt-3']); ?>
										<input type="hidden"
											   class="form-control"
											   name="id_user"
											   value="<?php echo $this->session->userdata('id_user'); ?>"
										>
										<input type="hidden"
											   class="form-control"
											   name="old_photo"
											   value="<?php echo $this->session->userdata('foto'); ?>"
										>
										<label for="userImage">
											Masukan Profile Baru Anda
										</label>
										<input
											type="file"
											class="form-control"
											name="userImage"
											id="userImage"
											accept="image/jpeg, image/png"
										/>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
											<button type="reset" class="btn btn-warning" id="cancel">Batal</button>
											<button type="submit" class="btn btn-primary">Unggah</button>
											<?php echo form_close(); ?>
										</div>
									<!--End Profile Update-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="input-profile">
			<div class="row mt-3">
				<div class="d-flex">
					<div class="grid gap-3">
						<div class="p-2 g-col-6">Nama</div>
					</div>
					<!--Username Update-->
					<div class="input-group">
						<?php echo form_open_multipart('Cuserprofile/updateusername', ['class' => 'input-group ']); ?>
						<input type="hidden"
							   class="form-control"
							   name="id_user"
							   value="<?php echo $this->session->userdata('id_user'); ?>"
						>
						<input type="text"
							   class="form-control"
							   name="username"
							   required
							   placeholder="<?php echo $this->session->userdata('username'); ?>"
						>
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">Edit</button>
						</span>
						<?php echo form_close(); ?>
					</div>
					<!--End Username Update-->
				</div>
			</div>
			<div class="row mt-3">
				<div class="d-flex">
					<div class="grid gap-3">
						<div class="p-2 g-col-6">Email</div>
					</div>
					<!--Email Update-->
					<?php echo form_open_multipart('Cuserprofile/updateemail', ['class' => 'input-group ']); ?>
					<div class="input-group">
						<input type="hidden"
							   class="form-control"
							   name="id_user"
							   value="<?php echo $this->session->userdata('id_user'); ?>"
						>
						<input type="email"
							   class="form-control"
							   name="email"
							   required
							   placeholder="<?php echo $this->session->userdata('email'); ?>"
						>
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">Edit</button>
						</span>
						<?php echo form_close(); ?>
					</div>
					<!--End Email Update-->
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	document.getElementById('userImage').onchange = function (){
		document.getElementById("imagePreview").src = URL.createObjectURL(userImage.files[0]);
	}

	// jika profile kosong digantikan dengan profile alternatif
	const img = document.getElementById("pfp")
	img.addEventListener("error", function (event){
		event.target.src = "https://imagetolink.com/ib/Zn9U9bxCzF.png"
		event.onerror = null
	})
</script>
</body>
</html>
<?php
