<div class="container mb-5 mt-5">
    <div class="row">
        <div class="col-12 col-sm-7 col-md-6 col-lg-4 mt-4">
            <img src="<?= base_url() ?><?= $data['foto'] ?>" class="card-img-top shadow rounded" alt="...">
        </div>
        <div class="col-12 col-sm-5 col-md-6 col-lg-8 mt-4">
            <div class="text-center fw-bold "><?= $data['nama'] ?></div>
            <hr>
            <p class="fs-7"><span class="fw-bold">Tanggal : </span><?= $data['tanggal'] ?></p>
            <p class="fs-7"><span class="fw-bold">Telephon : </span><?= $data['telp'] ?></p>
            <p class="fs-7"><span class="fw-bold">Persetujuan : <img src="<?= base_url($data['foto_admin']) ?>" style="width:20px;" class="img-fluid"> </span><?= $data['nama_admin'] ?></p>
            <p class="fs-7"><span class="fw-bold">Posting : </span><?= $data['judul'] ?></p>
        </div>
    </div>
</div>