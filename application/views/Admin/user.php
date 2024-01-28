<!-- DataTable -->
<main class="content px-3 py-2">
    <div class="container min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>User</h4>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div id="resault"></div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    var resaultdata;
    $(document).ready(function() {

        var html = '';

        $.ajax({
            type: 'GET',
            url: "http://localhost/findingNemu/admin/Cuser/user",
            success: function(data) {
                console.log(data);
                resaultdata = JSON.parse(data);
                html += '<table class="datatables-basic table">';
                html += '      <tr>';
                html += '         <th></th>';
                html += '           <th>Username</th>';
                html += '           <th>Email</th>';
                html += '          <th>No Tlp</th>  ';
                html += '          <th>Action</th>';
                html += '      </tr>';



                var base_url = '<?php echo base_url(); ?>';

                for (var i = 0; i < resaultdata.length; i++) {

                    html += '<tr>';
                    html += '<td><img src="' + base_url + resaultdata[i].foto + '" class="img-fixed-size profile-image-pic" alt="foto"></td>';
                    html += '<td>' + resaultdata[i].username + '</td>';
                    html += '<td>' + resaultdata[i].email + '</td>';
                    html += '<td>' + resaultdata[i].telp + '</td>';
                    html += '<td> <button type="button" class="btn btn-sm btn-danger" onclick="deletePosting(' + resaultdata[i].id_user + ')">Delete</button> ';
                    html += '</tr>';

                }

                html += '</table>';
                console.log(html);
                $("#resault").html(html);

            }
        });

    });

    function deletePosting(iduser) {

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
                    url: 'http://localhost/findingNemu/admin/Cuser/delete_user',
                    data: {
                        id_user: iduser
                    },
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.status === 'success') {

                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: result.message,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            }).then((result) => {

                                if (result.isConfirmed || result.dismiss === Swal.DismissReason.backdrop) {
                                    location.reload();
                                }
                            });
                        } else {

                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Gagal menghapus data: ' + result.message,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function() {

                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Terjadi kesalahan saat menghubungi server',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    }
</script>