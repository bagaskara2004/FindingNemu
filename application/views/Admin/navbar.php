<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('asset/css/adminstyle.css') ?>">
    <link rel="stylesheet" href="<?= base_url('asset/css/style.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <!------sidebar------>
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="<?= base_url('cauth/admindashboard') ?>"><img src="<?= base_url('asset/img/logo-light.png') ?>" alt="findingnemu" style="width: 100px;" class="img-fluid"></a>
                </div>
                <ul class="siderbar-nav">
                    <li class="sidebar-header">
                        <p>Admin Menu</p>
                    </li>

                    <li class="sidebar-item">
                        <a href="<?= base_url('Admin/Coverview') ?>" class="sidebar-link">
                            <span class="bi bi-clipboard-fill"></span>&nbsp; &nbsp;
                            Overview
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="<?= base_url('Admin/Cuser') ?>" class="sidebar-link">
                            <i class="bi bi-person-fill"></i>&nbsp; &nbsp;
                            User
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="<?= base_url('Admin/Cvalidasi') ?>" class="sidebar-link">
                            <span class="bi bi-printer-fill"></span>&nbsp; &nbsp;
                            Validasi
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="<?= base_url('admin/Ckonfirmasi') ?>" class="sidebar-link">
                            <span class="bi bi-flag-fill"></span>&nbsp; &nbsp;
                            Mengajukan
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="<?= base_url('Admin/Ckategori') ?>" class="sidebar-link">
                            <span class="bi bi-shield-fill-check"></span>&nbsp; &nbsp;
                            Kategori
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <!----Navbar---->
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
					<i class="bi bi-filter-left"></i>
                </button>
                <!--ini sementara untuk searchnya-->
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?=base_url('Cuserprofile/index')?>" class="nav-icon pe-md-0">
								<img src="<?php echo $this->session->userdata('foto_admin'); ?>" class="img-fluid profile-image-pic rounded-circle" width="40px" alt="profile" onerror="this.src='https://imagetolink.com/ib/Zn9U9bxCzF.png'; this.onerror='';">
                            </a>
                        </li>
                    </ul>
                </div>
                <aside id="nav-logo">
                    <img src="<?= base_url('asset/img/logo.png') ?>" alt="findingnemu" style="width: 80px;" class="img-fluid">
                </aside>
            </nav>
