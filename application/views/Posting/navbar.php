<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | FindingNemu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url('asset/css/style.css')?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="<?= base_url('asset/jquery/jquery-3.7.1.min.js')?>"></script>
</head>
<body>

<?php if($lokasi == "home") {?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow">
        <div class="container">
        <img src="<?=base_url('asset/img/logo.png')?>" alt="findingnemu" style="width:90px;"class="img-fluid" >
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <hr>
        <?php if ($this->session->userdata('username')) {?>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item button d-flex align-items-center">
                    <a class="nav-link fs-7 mx-auto" href="<?=base_url('Cposting/pengajuan')?>">PENGAJUAN</a>
                </li>
                <li class="nav-item button d-flex align-items-center">
                    <a class="nav-link fs-7 mx-auto" href="<?=base_url('Cposting/prosedur')?>">PROSEDUR</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link button mx-auto" href="#" data-bs-toggle="dropdown">
						<img src="<?php echo $this->session->userdata('foto'); ?>" class="img-fluid profile-image-pic rounded-circle" width="40px" alt="profile">
					</a>
					<div class="dropdown-menu dropdown-menu-end">
						<a href="#" class="dropdown-item">Profile</a>
						<a href="<?=base_url('Cauth/logout')?>" class="dropdown-item">Logout</a>
					</div>
                </li>
            </ul>
        <?php }else {?>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item border-blue button px-2 mx-1 rounded">
                    <a class="nav-link text-dark" href="<?=base_url('Cauth/login')?>">MASUK</a>
                </li>
                <li class="nav-item background-blue px-2 button mx-1 rounded">
                    <a class="nav-link text-light" href="<?=base_url('Cauth/register')?>">DAFTAR</a>
                </li>
            </ul>
        <?php }?>
        <hr>
        </div>
        </div>
    </nav>
<?php }?>

<?php if ($lokasi == "detail" || $lokasi == "profile" || $lokasi == "form") {?>
<!-- navbar untuk detail, profile, form -->
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow">
    <div class="container">
    <a class="navbar-brand fw-bold" href="<?=base_url('Cposting')?>"><i class="bi bi-chevron-left"></i></a>
    <img src="<?=base_url('asset/img/logo.png')?>" alt="findingnemu" style="width:90px;"class="img-fluid" >
    </div>
</nav>
<?php } ?>
