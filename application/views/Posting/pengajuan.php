<div class="container-fluid background-blue pt-5">
    <div class="container background-blue2 mt-5 text-light p-4 rounded fs-6">
        <?=form_open_multipart('Cposting/addPostingan');?>
        <div class="text-center fs-4 fw-bold">FORM PENGAJUAN</div>
        <hr>
        <?= $this->session->flashdata('message')?>
        <div class="mb-2">
            <label for="Judul" class="form-label ms-1">Judul</label>
            <input type="text" class="form-control" id="Judul" name="judul">
            <?= form_error('judul','<small class="text-warning px-2" pl-3>','</small>');?>
        </div>
        <label for="kategori" class="form-label ms-1">Kategori</label>
        <select class="form-select mb-2" name="kategori">
            <?php foreach ($kategori->result_array() as $kate) { ?>
            <option value="<?=$kate['id_kategori']?>"><?=$kate['kategori']?></option>
            <?php }?>
        </select>
        <label for="status" class="form-label ms-1">Status</label>
        <select class="form-select mb-2" name="status">
            <option value="0">Kehilangan</option>
            <option value="1">Temuan</option>
        </select>
        <label for="foto" class="form-label ms-1">Foto <span class="fs-7 color-yellow">*opsional</span></label>
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="foto">
        </div>
        <label for="deskripsi" class="form-label ms-1">Deskripsi</label>
        <div class="mb-5">
            <textarea id="deskripsi" rows="5" class="w-100 rounded p-2" maxlength="50" name="deskripsi"></textarea>
        </div>
        <button type="button" class="button border-none p-2 rounded w-100 background-yellow text-light fw-bold fs-6" data-bs-toggle="modal" data-bs-target="#exampleModal">KIRIM</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark fw-bold" id="exampleModalLabel">Pengajuan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">Kirim form pengajuan ?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <!-- <button type="submit" class="" onclick="confirm('Apakah Anda yakin?');">Submit</button> -->
                <button type="submit" class="btn btn-primary">Ya</button>
            </div>
            </div>
        </div>
        </div>
        </form>
    </div>
</div>