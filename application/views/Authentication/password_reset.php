<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Reset Password</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="<?=base_url("asset/css/style.css")?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<style>
	.container-form-resetpw {
		width: 300px;
		box-shadow: 0 0 5px black;
		border-radius: 10px;
		padding: 30px;

	}

	.img {
		width: 50%;
		margin-bottom: 20px;
	}

	.button{
		font-size: 20px;
		border-radius: 10px;
		width: 100%;
		padding: 8px;
	}

	a{
		text-decoration: none;
		text-decoration-color: #0000cc;
	}

	input{
		font-size: 20px;
	}

</style>
<body>
<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
	<div class="container-form-resetpw">
		<div class="d-flex justify-content-center py-1">
			<img src="<?=base_url("asset/img/logo.png")?>" class="img">
		</div>
		<?= $this->session->flashdata('message')?>
		<form action="<?= base_url('Cauth/lupapassword') ?>" method="post" class="d-flex flex-column justify-content-between" style="height:220px;">
			<div class="py-2">
				<div class="mb-0">
					<input type="email" placeholder="Sandi Baru" class="inputan fs-6 rounded p-3" name="email" value="">
					<?= form_error('email','<small class="text-danger" pl-3>','</small>');?>
				</div>
			</div>
			<div class="mt-1">
				<div class="mb-3">
					<input type="number" placeholder="Kode" class="inputan fs-6 rounded p-3" name="email" value="">
					<?= form_error('code','<small class="text-danger" pl-3>','</small>');?>
				</div>
			</div>
			<div class="container">
				<a href="<?=base_url("Cauth/lupapassword")?>" class="text-dark" >Kirim Ulang Kode</a>
			</div>
			<div class="container-btn mt-3">
				<div class="row">
					<div class="col">
						<button type="submit" class="button btn-lg background-blue border-none rounded text-light">Kirim</button>
					</div>
					<div class="col">
						<a href="<?=base_url("Cauth/login")?>" class="button btn-lg btn-block background-gray border-none rounded text-light" >Kembali</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
