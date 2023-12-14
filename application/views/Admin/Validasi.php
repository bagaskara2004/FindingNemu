<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simpan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h2 class="text-center">Login</h2>
                    <form action="<?php echo base_url('Cvalidasi/simpan'); ?>" autocomplete="off" method="post">
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
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>