<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url("asset/css/style.css")?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
        <div class="container-form1">
            <div class="d-flex justify-content-center py-1">
                <img src="<?=base_url("asset/img/logo.png")?>" class="w-50">
            </div>
            <form action="<?=base_url("Cauth/register")?>" method="post" class="d-flex flex-column justify-content-between">
                <div class="py-4">
                    <div class="form-group mb-3">
                        <input type="text" placeholder="Nama Pengguna" class="form-control-form-control-user inputan fs-6 rounded p-2 " name="username" value="<?= set_value('username') ?>">
                        <?= form_error('username','<small class="text-danger" pl-3>','</small>');?>
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" placeholder="Kata Sandi" class="inputan fs-6 rounded p-2" name="password" value="<?= set_value('password') ?>"> 
                        <?= form_error('password','<small class="text-danger" pl-3>','</small>');?>
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" placeholder="Email" class="inputan fs-6 rounded p-2" name="email" value="<?= set_value('email') ?>">
                        <?= form_error('email','<small class="text-danger" pl-3>','</small>');?>
                    </div>
                    <div class="form-group mb-3"> 
                        <input type="text" placeholder="No Telepon" class="inputan fs-6 rounded p-2" name="telp" value="<?= set_value('telp') ?>">
                        <?= form_error('telp','<small class="text-danger" pl-3>','</small>');?>
                    </div>
                </div>
                <div>
                    <button type="submit" class="button background-blue p-2 border-none w-100 rounded text-light" id="buttonSub">DAFTAR</button>
                    <button type="button" class="button background-blue p-2 border-none w-100 rounded text-light" id="btnLoad">
                        <div class="spinner-border" role="status"></div>
                    </button>
                    <a href="<?=base_url("Cauth/login")?>" class="button background-gray p-1 mt-2 rounded text-light" >MASUK</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="<?= base_url('asset/jquery/jquery-3.7.1.min.js')?>"></script>
    <script>
        $(document).ready(function () {
            $("#btnLoad").hide();
            $("#buttonSub").on('click',function () {
                $(this).hide();
                $("#btnLoad").show();
            })
        });
    </script>
</body>
</html>