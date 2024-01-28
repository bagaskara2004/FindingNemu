<main class="content px-3 py-2">
    <div class="container min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h4>admin</h4>
                </div>
                <div class="col-md-2 text-right">
                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#tambahadminModal">
                        Tambah Admin
                    </button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div id="admin_result"></div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="tambahadminModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formTambahadmin">
                        <div class="mb-3">
                            <label for="nama_admin" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_admin" required>
                        </div>


                        <div class="mb-3">
                            <label for="password_admin" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password_admin" required>
                        </div>
                        <div class="mb-3">
                            <label for="email_admin" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email_admin" required>
                        </div>

                        <div class="mb-3">
                            <label for="foto_admin" class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto_admin" accept="image/*" required>
                        </div>
                        <button type="button" class="btn btn-primary" id="tambahadminBtn">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    function loadAdmin() {
        $.ajax({
            type: 'GET',
            url: "<?php echo base_url('admin/Cadmin/viewAdmin'); ?>",
            success: function(data) {
                var adminData = JSON.parse(data);
                var html = '<table class="table table-bordered table-striped">';
                html += '<thead><tr><th>Nama</th><th>Email</th></tr></thead><tbody>';

                for (var i = 0; i < adminData.length; i++) {
                    html += '<tr>';
                    html += '<td>' + adminData[i].nama_admin + '</td>';
                    html += '<td>' + adminData[i].email_admin + '</td>';
                    html += '</tr>';
                }

                html += '</tbody></table>';
                $("#admin_result").html(html);
            }
        });
    }

    loadAdmin();

    $("#tambahadminBtn").on("click", function() {
        var formData = new FormData($("#formTambahadmin")[0]);

        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('admin/Cadmin/simpan_data'); ?>",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                var result = JSON.parse(data);

                if (result.status === 'success') {
                    loadAdmin();

                    Swal.fire({
                        title: 'Success!',
                        text: result.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });

                    $("#tambahadminModal").modal('hide');
                    $("#formTambahadmin")[0].reset();
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan. Silakan coba lagi.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'Terjadi kesalahan. Silakan coba lagi.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});

   
</script>