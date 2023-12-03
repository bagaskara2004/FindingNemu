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
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow">
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
    </nav>
    <header class="container-fluid text-center d-flex flex-column align-items-center justify-content-center py-5 mb-5 mt-5">
        <div class="font-1 color-blue fw-bold">Pencarian Barang Hilang</div>
        <div class="font-2">Pencarian Barang Jadi Lebih Mudah Dengan Website Kami</div>
        <div class="d-flex justify-content-center mx-auto mt-5 box-input" >
            <input type="text" placeholder="temukan barangmu" class="search rounded-start" id="search">
            <button class="button px-3 border-none background-yellow rounded-end ms-1 text-light fs-7" id="btnSearch"><i class="bi bi-search" id="iconSearch"></i></button>
        </div>
        <div class="img-size">
            <img src="<?=base_url('asset/img/kota.png')?>" class="img-fluid" alt="...">    
        </div>
        <div class="d-flex box-input">
            <button type="button" class="button py-2 border-none w-50 border border-dark-subtle fs-7 " style="border-radius:20px 0 0 20px ;" id="kehilangan">Kehilangan</button>
            <button type="button" class="button py-2 border-none w-50 background-yellow text-light border border-dark-subtle fs-7 " id="temuan" style="border-radius:0 20px 20px 0;">Temuan</button>
        </div>
    </header>
    <div class="container-fluid background-blue">
        <div class="container background-blue2 rounded daftar-barang pb-3" >
            <div class="container fs-5 fw-bold text-center responsive-font-example text-light p-3" id="label">TEMUAN</div>
            <div class="box-item" id="content"></div>
            <!-- <button type="button" class="button border-none text-light w-100 background-yellow fw-bold fs-6 rounded p-2 mt-5 ">Lainnya</button> -->
        </div>
    </div>
    <footer class="container-fluid background-blue">
        <div class="row text-center text-light py-4">
            <div class="col-12 col-sm-6">
                <hr>
                <img src="<?=base_url('asset/img/logo-light.png')?>" alt="findingnemu" style="width:90px;" >
                <p class="mt-3 fs-7">FindingNemu adalah website untuk melakukan pencarian barang hilang dan bisa juga untuk melaporkan barang hilang</p>
            </div>
            <div class="col-12 col-sm-6">
                <hr>
                <p class="fw-semibold">Contact US</p>
                <p class="fs-7"><i class="bi bi-geo-alt-fill"></i> Jl Raya Kampus Unud</p>
                <p class="fs-7"><i class="bi bi-telephone-fill"></i> 089 xxx xxx xxx</p>
                <p class="fs-7"><i class="bi bi-envelope-fill"></i> findingnemu@gmail.com</p>
            </div>
        </div>
        <div class="row text-center background-blue3 text-light">
            <div class="col-12 fs-7 p-1">FindingNemu PNB @2023</div>
        </div>
    </footer>

<script src="<?= base_url('asset/jquery/jquery-3.7.1.min.js')?>"></script>
<script>
$(document).ready(function () {
    let location = 1;

    data_item();

    if ($("#search").val() != "") {
        $('button i.bi').addClass('bi-x-lg');
    }

    $('#search').on('input',function () {
        $('button i.bi').addClass('bi-x-lg');
        if ($('#search').val() == "") {
            $('button i.bi').removeClass('bi-x-lg');
        }
        data_item();
    });

    $('#btnSearch').on("click",function () {
        $('#search').val("");
        $('button i.bi').removeClass('bi-x-lg');
        data_item();
    });

    $('#kehilangan').on('click',function () {
        $('#label').text("KEHILANGAN");
        $('#kehilangan').addClass('background-yellow text-light');
        $('#temuan').removeClass('background-yellow text-light');
        location = 0;
        data_item();
    });

    $('#temuan').on('click',function () {
        $('#label').text("TEMUAN");
        $('#kehilangan').removeClass('background-yellow text-light');
        $('#temuan').addClass('background-yellow text-light');
        location = 1;
        data_item();
    });

    $("#search").on('keypress',function (e) {
        if (e.keyCode == 13) {
            window.scrollTo(0, 300)
        }
    })

    function data_item() {
        $.ajax({
            url: '<?php echo base_url(); ?>/Chome/item',
            method: 'post',
            data: {
                cari : $('#search').val(),
                lokasi : location
            },
            success:function(data){
                $('#content').html(data);

            }
        });
    }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>