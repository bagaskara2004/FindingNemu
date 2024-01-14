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
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-2">Lupa Password</h1>
            </div>
            <?= $this->session->flashdata('message')?>
            <form action="<?= base_url('Cauth/lupapassword') ?>" method="post" class="d-flex flex-column justify-content-between" style="height:220px;">
                <div class="py-4">
                    <div class="mb-3">
                        <input type="email" placeholder="Email" class="inputan fs-6 rounded p-2" name="email" value="">
                        <?= form_error('email','<small class="text-danger" pl-3>','</small>');?>
                    </div>
                </div>
                <div>
                    <button type="submit" class="button background-blue p-2 border-none w-100 rounded text-light">RESER PASSWORD</button>
                    <a href="<?=base_url("Cauth/login")?>" class="button background-gray p-1 mt-2 rounded text-light" >Kembali ke Login</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>