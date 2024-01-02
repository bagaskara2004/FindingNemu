
    <div class="container min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>Konfirmasi Posting</h4>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div id="posting_result"></div>
            </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            type: 'GET',
            url: "<?php echo base_url('admin/Ckonfirmasi/get_posting/1'); ?>",
            success: function(data) {
                var postingData = JSON.parse(data);
                var html = '<table class="table table-bordered table-striped">';
                html += '<thead><tr><th>Judul</th><th>Tanggal</th><th>Kategori</th><th>Status</th><th>Action</th></tr></thead><tbody>';

                for (var i = 0; i < postingData.length; i++) {
                    html += '<tr>';
                    html += '<td>' + postingData[i].judul + '</td>';
                    html += '<td>' + postingData[i].tanggal + '</td>';
                    html += '<td>' + postingData[i].kategori + '</td>';
                    var status = 'Ditemukan';
                    if (postingData[i].status == 0) {
                        status = 'Hilang';
                    }
                    html += '<td>' + status + '</td>';
                    html += '<td>';
                    html += '<button type="button" class="btn btn-success btn-sm" onclick="approvePosting(' + postingData[i].id_posting + ')">Terima</button>';
                    html += '<button type="button" class="btn btn-danger btn-sm ml-1" onclick="rejectPosting(' + postingData[i].id_posting + ')">Tolak</button>';
                    html += '</td>';
                    html += '</tr>';
                }

                html += '</tbody></table>';
                $("#posting_result").html(html);
            }
        });
    });


    function approvePosting(id) {

        updateKonfirmasi(id, 3);
    }

    function rejectPosting(id) {

        updateKonfirmasi(id, 2);
    }

    function updateKonfirmasi(id, konfirmasi) {

        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('admin/Ckonfirmasi/update_konfirmasi'); ?>",
            data: {
                id_posting: id,
                id_konfirmasi: konfirmasi
            },
            success: function(response) {

                console.log(response);


                location.reload();
            }
        });
    }
</script>