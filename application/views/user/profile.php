<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Profile | FindingNemu</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="<?=base_url('asset/css/style.css')?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
	<script src="<?= base_url('asset/jquery/jquery-3.7.1.min.js')?>"></script>
</head>
<style>
	.table{
		border-collapse: collapse;
		border-spacing: 0;
		text-align: center;
	}
</style>
<body>
<div class="container py-5 h-100">
	<div class="row">
		<div class="row mb-3">
			<div class="d-flex align-items-center">
				<a class="nav-link button mx-auto" href="#" data-bs-toggle="dropdown">
					<img src="<?php echo $this->session->userdata('foto'); ?>" class="img-fluid profile-image-pic rounded-circle" width="150px" alt="profile">
				</a>
				<div class="dropdown-menu dropdown-menu-end">
					<a href="#" class="dropdown-item">Edit Foto</a>
					<a href="<?=base_url('Cauth/logout')?>" class="dropdown-item">Logout</a>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="d-flex">
				<div class="grid gap-3">
					<div class="p-2 g-col-6">Nama</div>
				</div>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="<?php echo $this->session->userdata('username'); ?>">
						<span class="input-group-btn">
						<button class="btn btn-default" type="button">Edit</button>
					</span>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="d-flex">
				<div class="grid gap-3">
					<div class="p-2 g-col-6">Email</div>
				</div>
				<div class="input-group">
					<input type="email" class="form-control" placeholder="<?php echo $this->session->userdata('email'); ?>">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">Edit</button>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid background-blue">
	<div class="container background-blue2 rounded daftar-barang pb-3" >
		<div class="container fs-5 fw-bold text-center responsive-font-example text-light p-3" id="label">
			Status
		</div>
		<div class="card">
			<div class="table-responsive text-nowrap">
				<table class="table">
					<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Status</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<th>test</th>
						<th>test</th>
						<th>test</th>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

</body>
</html>
<?php
