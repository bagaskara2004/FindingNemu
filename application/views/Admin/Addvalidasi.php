
                    <h2 class="text-center">Validasi Data</h2>
                    <form action="<?php echo base_url('Admin/Cvalidasi/simpan'); ?>" autocomplete="off" method="post">

                        <input type="hidden" name="id_postingan" value="<?php echo $data; ?>">

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
                            <button type="submit" class="btn btn-outline-primary">Validasi</button>
                        </div>
                    </form>
               
