<div class="container">

    <div class="row">
        <div class="col-md-10">
            <h4>Detail</h4>
        </div>


        <div class="col-md-2 text-right">
            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#validasiModal">
                Validasi
            </button>
        </div>
    </div>
</div>

<div class="modal fade" id="validasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Validasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="popup" class="alert" style="display: none; position: fixed; top: 10px; right: 10px; z-index: 9999;"></div>

                <?php echo form_open_multipart('Admin/Cvalidasi/simpan', ['class' => 'container mt-3', 'id' => 'formValidasi']); ?>

                <input type="hidden" name="id_posting" value="<?php echo $data['id_posting']; ?>">

                <div class="mb-3 mt-3">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="mb-3">
                    <label>No Telephone</label>
                    <input type="number" class="form-control" name="telp">
                </div>
        
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" name="foto" accept="image/*" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnSimpan">Simpan</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#btnSimpan").on("click", function() {

            $(this).prop("disabled", true);

            var formData = new FormData($('#formValidasi')[0]);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Admin/Cvalidasi/simpan'); ?>",
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 'success') {
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            location.reload();
                        });
                        $('#validasiModal').modal('hide');
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            location.reload();
                        });
                    }
                },
                complete: function() {

                    $("#btnSimpan").prop("disabled", false);
                }
            });
        });
    });
</script>