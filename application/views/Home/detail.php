<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail | FindingNemu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url('asset/css/style.css')?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="navbar bg-body-tertiary shadow fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?=base_url('Cposting')?>"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand background-yellow text-light rounded py-2 px-3 fs-6 fw-bold"><i class="bi bi-info-circle me-2"></i>Detail</a>
        </div>
    </nav>
    <div class="container mb-5 mt-5">
        <?php
        $data = $this->db->get_where('posting',['id_posting' => $id_posting])->row_array();
        ?>
        <div class="row">
            <div class="col-12 col-sm-7 col-md-6 col-lg-4 mt-4">
                <img src="<?=base_url()?><?=$data['foto']?>" class="card-img-top shadow rounded" alt="...">
            </div>
            <div class="col-12 col-sm-5 col-md-6 col-lg-8 mt-4">
                <div class="text-center fw-bold "><?=$data['judul']?></div>
                <hr>
                <p class="fs-7"><span class="fw-bold">Kategori : </span><?=$data['id_kategori']?></p>
                <p class="fs-7"><span class="fw-bold">Status : </span><?=$data['status']?></p>
                <p class="fs-7"><span class="fw-bold">Pelapor : </span><?=$data['id_user']?></p>
                <p class="fs-7"><span class="fw-bold">Deskripsi : </span><?=$data['deskripsi']?></p>
            </div>
        </div>
    </div>
    <div class="container-fluid background-blue">
        <div class="container background-blue2 relative rounded pb-2">
            <div class="p-2 text-center text-light fs-5 responsive-font-example">COMMENT</div>
            <div id="chat" class="overflow-auto" style="height:300px;">
                <div class="d-flex fs-7 text-light background-blue3 py-1 align-items-center mb-1 overflow-auto">
                    <div class="fw-bold text-center px-3">jhon</div>
                    <div class="border-start px-2">ffds tadi aku lihat di kantin dsd sds d sdsd sdsds</div>
                </div>
            </div>
            <div class="d-flex justify-content-center w-100 mt-2" >
                <input type="text" placeholder="kirim pesan" class="search rounded-start fs-7" id="search">
                <button class="button px-3 border-none background-yellow rounded-end ms-1 text-light fs-7" id="btnSearch"><i class="bi bi-search" id="iconSearch"></i></button>
            </div>
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
    if ($("#search").val() != "") {
        $('button i.bi').addClass('bi-x-lg');
    }

    $('#search').on('input',function () {
        $('button i.bi').addClass('bi-x-lg');
        if ($('#search').val() == "") {
            $('button i.bi').removeClass('bi-x-lg');
        }
    });

    $('#btnSearch').on("click",function () {
        $('#search').val("");
        $('button i.bi').removeClass('bi-x-lg');
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>