<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | FindingNemu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url("asset/css/style.css")?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top shadow">
        <div class="container">
        <img src="<?=base_url("asset/img/logo.png")?>" alt="findingnemu" style="width:90px;"class="img-fluid" >
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <hr>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item border-blue button px-2 mx-1">
            <a class="nav-link text-dark" href="#">MASUK</a>
            </li>
            <li class="nav-item background-blue px-2 button mx-1">
            <a class="nav-link text-light" href="#">DAFTAR</a>
            </li>
        </ul>
        <hr>
        </div>
        </div>
    </nav>
    <header class="container-fluid">
        <div class="container text-center">
            <div class="font-1 color-blue">Pencarian Barang Hilang</div>
            <div class="font-3">Pencarian Barang Jadi Lebih Mudah dan Aman Dengan Website Kami</div>
            <div class="d-flex justify-content-center w-50 mx-auto mt-5">
                <input type="text" placeholder="temukan barangmu disini" class="inputan rounded-start">
                <button class="button px-3 border-none background-yellow rounded-end ms-1">Cari</button>
            </div>
            <img src="<?=base_url('asset/img/kota.png')?>" alt="">
        </div>
    </header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>