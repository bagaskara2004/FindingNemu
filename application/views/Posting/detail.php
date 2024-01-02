<div class="container mb-5 mt-5">
    <div class="row">
        <div class="col-12 col-sm-7 col-md-6 col-lg-4 mt-4">
            <img src="<?= base_url() ?><?= $data['foto'] ?>" class="card-img-top shadow rounded" alt="...">
        </div>
        <div class="col-12 col-sm-5 col-md-6 col-lg-8 mt-4">
            <div class="text-center fw-bold "><?= $data['judul'] ?></div>
            <hr>
            <p class="fs-7"><span class="fw-bold">Kategori : </span><?= $kategori['kategori'] ?></p>
            <p class="fs-7"><span class="fw-bold">Status : </span><?= $status ?></p>
            <p class="fs-7"><span class="fw-bold">Pelapor : <img src="<?= base_url('asset/foto_profile/default.png') ?>" alt="findingnemu" style="width:20px;" class="img-fluid"> </span><?= $pelapor['username'] ?></p>
            <p class="fs-7"><span class="fw-bold">Deskripsi : </span><?= $data['deskripsi'] ?></p>
        </div>
    </div>
</div>

<?php if ($this->session->userdata('username')) { ?>
    <div class="container-fluid background-blue">
        <div class="container background-blue2 relative rounded pb-2">
            <div class="p-2 text-center text-light fs-5 responsive-font-example">COMMENT</div>
            <div id="chat" class="overflow-auto" style="height:300px;"></div>
            <div class="d-flex justify-content-center w-100 mt-2">
                <input type="text" placeholder="kirim pesan" class="search rounded-start fs-7" id="search">
                <button class="button px-3 border-none background-yellow rounded-end ms-1 text-light fs-7" id="btnSearch"><i class="bi bi-search" id="iconSearch"></i></button>
            </div>
        </div>
    </div>
<?php } ?>

<script>
    $(document).ready(function() {
        comment("");

        if ($("#search").val() != "") {
            $('button i.bi').addClass('bi-x-lg');
        }

        $('#search').on('input', function() {
            $('button i.bi').addClass('bi-x-lg');
            if ($('#search').val() == "") {
                $('button i.bi').removeClass('bi-x-lg');
            }
        });

        $('#btnSearch').on("click", function() {
            $('#search').val("");
            $('button i.bi').removeClass('bi-x-lg');
        });

        $("#search").on('keypress', function(e) {
            if (e.keyCode == 13) {
                if ($.trim($("#search").val()) != "") {
                    $('button i.bi').removeClass('bi-x-lg');
                    comment($("#search").val());
                    $("#search").val("");
                }
            }
        });

        function comment(key) {
            $.ajax({
                url: '<?= base_url() ?>/Cposting/comment',
                method: 'post',
                data: {
                    keyword: key,
                    id_user: <?= $user['id_user'] ?>,
                    id_posting: <?= $data['id_posting'] ?>
                },
                success: function(data) {
                    $('#chat').html(data);
                }
            });
        }
    });
</script>