<header class="container-fluid text-center d-flex flex-column align-items-center justify-content-center py-5 mb-5 mt-5">
    <div class="font-1 color-blue fw-bold">Pencarian Barang Hilang</div>
    <div class="font-2">Pencarian Barang Jadi Lebih Mudah Dengan Website Kami</div>
    <div class="d-flex justify-content-center mx-auto mt-5 box-input mb-3" >
        <input type="text" placeholder="temukan barangmu" class="search rounded-start" id="search">
        <button class="button px-3 border-none background-yellow rounded-end ms-1 text-light fs-7" id="btnSearch"><i class="bi bi-search" id="iconSearch"></i></button>
    </div>
    <div class="img-size ">
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
            url: '<?= base_url() ?>/Cposting/search',
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