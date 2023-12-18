<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('asset/css/adminstyle.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
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
                        <a href="<?= base_url('Admin/Coverview/overview') ?>" class="sidebar-link">
                            <span class="bi bi-clipboard-fill"></span>&nbsp; &nbsp;
                            Overview
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="bi bi-person-fill"></i>&nbsp; &nbsp;
                            User
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <span class="bi bi-printer-fill"></span>&nbsp; &nbsp;
                            Print
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <span class="bi bi-flag-fill"></span>&nbsp; &nbsp;
                            Penemuan
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <span class="bi bi-shield-fill-check"></span>&nbsp; &nbsp;
                            Security
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <!----Navbar---->
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--ini sementara untuk searchnya-->
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="https://imagetolink.com/ib/0nKZYSJqVX.png" class="img-fluid profile-image-pic rounded-circle" width="40px" alt="profile">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <aside id="nav-logo">
                    <img src="<?= base_url('asset/img/logo.png') ?>" alt="findingnemu" style="width: 80px;" class="img-fluid">
                </aside>
            </nav>