<div class="col col-md-3">
    <button type="button" class="btn btn-sm btn-danger">Delete</button>
    <button type="button" class="btn btn-sm btn-primary">Update</button>
    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#validasiModal">Validasi</button>
</div>

<!-- Modal Validasi -->
<div class="modal fade" id="validasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div id="popup" class="alert" style="display: none; position: fixed; top: 10px; right: 10px; z-index: 9999;"></div>

                <h5 class="modal-title" id="exampleModalLabel">Form Validasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formValidasi" autocomplete="off">
                    <input type="hidden" name="id_postingan" value="<?php echo $data['id_posting']; ?>">

                    <div class="mb-3 mt-3">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label>No Telephone</label>
                        <input type="number" class="form-control" name="telp">
                    </div>
                    <div class="mb-3">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal">
                    </div>
                    <div class="mb-3">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto" size="20" required>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-primary" onclick="simpanValidasi()">Validasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Tambahkan JavaScript untuk menangani AJAX -->
<script>
    function simpanValidasi() {

        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('index.php/Cvalidasi/simpan'); ?>",
            data: $('#formValidasi').serialize(),
            success: function(response) {

                console.log(response);


                tampilkanPopup('success', 'Data berhasil disimpan.');


                $('#validasiModal').modal('hide');
            },
            error: function(response) {

                console.log(response);


                tampilkanPopup('error', 'Gagal menyimpan data.');
            }
        });
    }

    function tampilkanPopup(tipe, pesan) {

        $('#popup').removeClass().addClass('alert alert-' + tipe);


        $('#popup').text(pesan);


        $('#popup').fadeIn(500).delay(2000).fadeOut(500);
    }
</script>