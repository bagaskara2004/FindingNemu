<div class="container mb-5 mt-5">
    <div class="row">
        <div class="col-12 col-sm-7 col-md-6 col-lg-4 mt-4">
            <img src="<?= base_url() ?><?= $data['foto'] ?>" class="card-img-top shadow rounded" alt="...">
        </div>
        <div class="col-12 col-sm-5 col-md-6 col-lg-8 mt-4">
            <div class="text-center fw-bold "><?= $data['judul'] ?></div>
            <hr>
            <p class="fs-7"><span class="fw-bold">Kategori : </span><?= $data['kategori'] ?></p>
            <p class="fs-7"><span class="fw-bold">Status : </span><?= $status ?></p>
            <p class="fs-7"><span class="fw-bold">Pelapor : <img src="<?= base_url($data['foto_user']) ?>" style="width:20px;" class="img-fluid"> </span><?= $data['username'] ?></p>
            <p class="fs-7"><span class="fw-bold">Deskripsi : </span><?= $data['deskripsi'] ?></p>
        </div>
    </div>
</div>