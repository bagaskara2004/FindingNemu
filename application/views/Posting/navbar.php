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

<!-- user belum login -->

<!-- <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow">
    <div class="container">
    <img src="<?=base_url('asset/img/logo.png')?>" alt="findingnemu" style="width:90px;"class="img-fluid" >
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <hr>
    <ul class="navbar-nav ms-auto">
        <li class="nav-item border-blue button px-2 mx-1 rounded">
            <a class="nav-link text-dark" href="<?=base_url('Cauth/login')?>">MASUK</a>
        </li>
        <li class="nav-item background-blue px-2 button mx-1 rounded">
            <a class="nav-link text-light" href="<?=base_url('Cauth/register')?>">DAFTAR</a>
        </li>
    </ul>
    <hr>
    </div>
    </div>
</nav> -->

<!-- user sudah login -->

<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow">
    <div class="container">
    <img src="<?=base_url('asset/img/logo.png')?>" alt="findingnemu" style="width:90px;"class="img-fluid" >
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <hr>
    <ul class="navbar-nav ms-auto">
        <li class="nav-item button d-flex align-items-center">
            <a class="nav-link fs-7 mx-auto" href="<?=base_url('Cposting/pengajuan')?>">PENGAJUAN</a>
        </li>
        <li class="nav-item button d-flex align-items-center">
            <a class="nav-link fs-7 mx-auto" href="<?=base_url('Cauth/register')?>">PROSEDUR</a>
        </li>
        <li class="nav-item">
            <a class="nav-link button mx-auto" href="<?=base_url('Cauth/register')?>"><img src="<?=base_url('asset/foto_profile/default.png')?>" alt="findingnemu" style="width:30px;"class="img-fluid" ></a>
        </li>
    </ul>
    <hr>
    </div>
    </div>
</nav>


<!-- navbar untuk detail, profile, form -->

<!-- <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow">
    <div class="container">
    <a class="navbar-brand fw-bold" href="<?=base_url('Cposting')?>"><i class="bi bi-chevron-left"></i></a>
    <img src="<?=base_url('asset/img/logo.png')?>" alt="findingnemu" style="width:90px;"class="img-fluid" >
    </div>
</nav> -->