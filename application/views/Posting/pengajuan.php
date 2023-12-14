<div class="container-fluid background-blue pt-5">
    <div class="container background-blue2 mt-5 text-light p-4 rounded fs-6">
        <form>
        <div class="text-center fs-4 fw-bold">FORM PENGAJUAN</div>
        <hr>
        <div class="mb-2">
            <label for="Judul" class="form-label ms-1">Judul</label>
            <input type="text" class="form-control" id="Judul" maxlength="20">
        </div>
        <label for="kategori" class="form-label ms-1">Kategori</label>
        <select class="form-select mb-2">
            <option selected>Pilih kategori</option>
            <?php foreach ($kategori->result_array() as $kate) { ?>
            <option value="<?=$kate['id_kategori']?>"><?=$kate['kategori']?></option>
            <?php }?>
        </select>
        <label for="status" class="form-label ms-1">Status</label>
        <select class="form-select mb-2">
            <option selected>Pilih Status</option>
            <option value="0">Kehilangan</option>
            <option value="1">Temuan</option>
        </select>
        <label for="foto" class="form-label ms-1">Foto <span class="fs-7 color-yellow">*opsional</span></label>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
        </div>
        <label for="deskripsi" class="form-label ms-1">Deskripsi</label>
        <div class="mb-5">
            <textarea name="" id="deskripsi" rows="5" class="w-100 rounded p-2"></textarea>
        </div>
        <button type="submit" class="button border-none p-2 rounded w-100 background-yellow text-light fw-bold fs-6">Submit</button>
        </form>
    </div>
</div>