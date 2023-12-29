<div class="col col-md-3">
    <button type="button" class="btn btn-sm btn-danger" onclick="deleteData()">Delete</button>
    <button type="button" class="btn btn-sm btn-primary" onclick="updateData()">Update</button>
    <button type="button" class="btn btn-sm btn-warning" onclick="openValidationModal()">Validasi</button>
</div>

<div class="modal fade" id="validasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Validasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="popup" class="alert" style="display: none; position: fixed; top: 10px; right: 10px; z-index: 9999;"></div>

                <form id="validasiForm" class="container mt-3">
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
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto" accept="image/*" required>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" onclick="submitValidationForm()">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openValidationModal() {
        $('#validasiModal').modal('show');
    }

    function submitValidationForm() {
        var formData = new FormData($('#validasiForm')[0]);

        $.ajax({
            type: 'POST',
            url: 'findingNemu/Admin/Cvalidasi/simpan',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var result = JSON.parse(response);
                if (result.status === 'success') {
                    alert(result.message);
                    $('#validasiModal').modal('hide');
                } else {
                    alert('Gagal menyimpan data: ' + result.message);
                }
            },
            error: function() {
                alert('Terjadi kesalahan saat menghubungi server');
            }
        });
    }

    function deleteData() {
        // Implementasi penghapusan data menggunakan Ajax di sini
    }

    function updateData() {
        // Implementasi pembaruan data menggunakan Ajax di sini
    }
</script>