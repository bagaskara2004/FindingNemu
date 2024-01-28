<style>
    .img-fixed-size {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 50%;
    }
</style>
<main class="content px-3 py-2">
    <div class="container min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>Validasi</h4>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div id="resault"></div>

                <div class="modal" tabindex="-1" id="validasiModaledit" aria-labelledby="validasiModallable" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="validasiModallable">Edit validasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php echo form_open_multipart('admin/Cvalidasi/update_data', ['class' => 'container mt-3', 'id' => 'editForm']); ?>
                                <input type="hidden" name="id_validasi_edit" id="id_validasi_edit" value="">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama_edit" required>
                                </div>

                                <div class="mb-3">
                                    <label for="telp" class="form-label">No Telephone</label>
                                    <input type="number" class="form-control" name="telp" id="telp_edit" required>
                                </div>

                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" class="form-control" name="foto" id="foto_edit" accept="image/*">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="updatevalidasi()">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>

</main>
<script type="text/javascript">
    var resaultdata;
    $(document).ready(function() {
        var html = '';

        $.ajax({
            type: 'GET',
            url: "http://localhost/findingNemu/admin/Cvalidasi/validasi",
            success: function(data) {
                console.log(data);
                resaultdata = JSON.parse(data);

                html += '<table class="datatables-basic table">';
                html += '<tr>';
                html += '<th></th>';
                html += '<th>Nama</th>';
                html += '<th>Tanggal</th>';
                html += '<th>Telp</th>';
                html += '<th>Nama Admin</th>';
                html += '<th>ID Posting</th>';
                html += '</tr>';

                var base_url = '<?php echo base_url(); ?>';

                for (var i = 0; i < resaultdata.length; i++) {
                    html += '<tr>';
                    html += '<td><img src="' + base_url + resaultdata[i].foto + '" class="img-fixed-size profile-image-pic" alt="foto"></td>';
                    html += '<td>' + resaultdata[i].nama + '</td>';
                    html += '<td>' + resaultdata[i].tanggal + '</td>';
                    html += '<td>' + resaultdata[i].telp + '</td>';
                    html += '<td>' + resaultdata[i].nama_admin + '</td>';
                    html += '<td>' + resaultdata[i].id_posting + '</td>';
                    html += '<td> <button type="button" class="btn btn-sm btn-danger" onclick="deletePosting(' + resaultdata[i].id_validasi + ')">Delete</button> <button type="button" class="btn btn-sm btn-primary" onclick="openEditModal(' + resaultdata[i].id_validasi + ')">Update</button> <button type="button" class="btn btn-sm btn-warning btn-detail" data-id="' + resaultdata[i].id_validasi + '">Detail</button>';
                    html += '</tr>';

                }

                html += '</table>';
                console.log(html);
                $("#resault").html(html);
                $('.btn-detail').click(function() {
                    var idvalidasi = $(this).data('id');
                    window.location.href = '<?php echo base_url('admin/Cvalidasi/getValidasi/'); ?>' + idvalidasi;
                });

            }
        });


    });

    function deletePosting(idvalidasi) {

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda tidak akan dapat mengembalikan ini!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: 'POST',
                    url: 'Cvalidasi/delete_data',
                    data: {
                        id_validasi: idvalidasi
                    },
                    success: function(response) {
                        console.log(response);
                        var hapuskategori = JSON.parse(response);
                        if (hapuskategori.status == 'success') {
                            Swal.fire({
                                title: 'Success!',
                                text: hapuskategori.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(function() {
                                location.reload();
                            });
                            $('#validasiModaledit').modal('hide');
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: hapuskategori.message,
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
            }
        });
    }

    function updatevalidasi() {
        var idvalidasi = $('#id_validasi_edit').val();

        var formData = new FormData($('#editForm')[0]);
        formData.append('id_validasi', idvalidasi);


        $.ajax({
            type: 'POST',
            url: 'http://localhost/findingNemu/admin/Cvalidasi/update_data',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                var resaul = JSON.parse(response);
                if (resaul.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: resaul.message,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((resaul) => {

                        if (resaul.isConfirmed || resaul.dismiss === Swal.DismissReason.backdrop) {
                            location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal mengupdate data: ' + resaul.message,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Gagal mengupdate data: ' + resaul.message,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            }
        });
    }



    function openEditModal(idvalidasi) {

        var validasi = resaultdata.find(post => post.id_validasi == idvalidasi);

        if (validasi) {
            $('#id_validasi_edit').val(validasi.id_validasi);
            $('#nama_edit').val(validasi.nama);
            $('#tanggal_edit').val(validasi.tanggal);
            $('#telp_edit').val(validasi.telp);


            $('#validasiModaledit').modal('show');
        } else {
            alert('validasi not found.');
        }
    }
</script>