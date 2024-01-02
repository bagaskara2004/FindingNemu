<!-- Main Content -->
<main class="content px-3 py-2">
    <div class="container min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>Kategori</h4>
                </div>
                <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#tambahKategoriModal">
                        Tambah Kategori
                    </button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div id="kategori_result"></div>
            </div>
        </div>
    </div>

    <!-- Tambah Kategori Modal -->
    <div class="modal fade" id="tambahKategoriModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formTambahKategori">
                        <div class="form-group">
                            <label for="kategori">Kategori:</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" required>
                        </div>
                        <button type="button" class="btn btn-primary" id="tambahKategoriBtn">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    $(document).ready(function() {
        function loadKategori() {
            $.ajax({
                type: 'GET',
                url: "<?php echo base_url('admin/Ckategori/get_kategori'); ?>",
                success: function(data) {
                    var kategoriData = JSON.parse(data);
                    var html = '<table class="table table-bordered table-striped">';
                    html += '<thead><tr><th>Kategori</th><th>Jumlah</th></tr></thead><tbody>';

                    for (var i = 0; i < kategoriData.length; i++) {
                        html += '<tr>';
                        html += '<td>' + kategoriData[i].kategori + '</td>';
                        html += '<td>' + kategoriData[i].jumlah + '</td>';
                        html += '</tr>';
                    }

                    html += '</tbody></table>';
                    $("#kategori_result").html(html);
                }
            });
        }


        loadKategori();


        $("#tambahKategoriBtn").on("click", function() {
            var kategori = $("#kategori").val();

            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('admin/Ckategori/tambah_kategori'); ?>",
                data: {
                    kategori: kategori
                },
                success: function(data) {

                    loadKategori();


                    Swal.fire({
                        title: 'Success!',
                        text: 'Kategori berhasil ditambahkan.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });


                    $("#tambahKategoriModal").modal('hide');


                    $("#formTambahKategori")[0].reset();
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