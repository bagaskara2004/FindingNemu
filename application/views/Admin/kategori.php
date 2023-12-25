<main class="content px-3 py-2">
        <div class="container min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Kategori</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal">
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
    </main>

</main>
<script type="text/javascript">
    $(document).ready(function() {
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
    });
</script>