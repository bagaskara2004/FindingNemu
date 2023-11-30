<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk | FindingNemu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url("asset/css/style.css")?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
        <div class="container-form1 ">
            <div class="d-flex justify-content-center py-1">
                <img src="<?=base_url("asset/img/logo.png")?>" class="w-50">
            </div>
            <form action="#" method="post" class="d-flex flex-column justify-content-between" style="height:355px;">
                <div class="py-4">
                    <div class="mb-3">
                        <input type="text" placeholder="Nama Pengguna" class="inputan fs-6 rounded p-2">
                    </div>
                    <div class="mb-3">
                        <input type="password" placeholder="Kata Sandi" class="inputan fs-6 rounded p-2">
                        <a class="link-offset-2 link-underline link-underline-opacity-0 color-blue fs-7 mx-2" href="#">Lupa Password?</a>
                    </div>
                </div>
                <div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label color-gray fs-6" for="exampleCheck1">ingatkan saya</label>
                    </div>
                    <button type="submit" class="button background-blue p-2 border-none w-100 rounded text-light">MASUK</button>
                    <a href="<?=base_url("Cauth/register")?>" class="button background-gray p-1 mt-2 rounded text-light" >DAFTAR</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>