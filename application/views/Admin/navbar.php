<?php if ($this->session->userdata('nama_admin') == '') {
    redirect('Cauth/login', 'refresh');
}
?>
<!DOCTYPE html>
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
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('asset/jquery/jquery-3.7.1.min.js') ?>"></script>

</head>
<style>
	.profile-preview{
		text-align: center;
		align-content: center;
		margin-bottom: 30px;
	}
</style>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <!------sidebar------>
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="<?= base_url('Admin/Cadmin') ?>"><img src="<?= base_url('asset/img/logo-light.png') ?>" alt="findingnemu" style="width: 100px;" class="img-fluid"></a>
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
            <nav class="navbar navbar-expand-lg navbar-light px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
					<i class="bi bi-filter-left"></i>
                </button>

                <form class="d-flex ms-auto">
                    <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" id="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="<?= base_url($this->session->userdata('foto_admin')) ?>" class="img-fluid profile-image-pic rounded-circle" width="40px" alt="profile" onerror="this.src='https://imagetolink.com/ib/Zn9U9bxCzF.png'; this.onerror='';">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
								<button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModal">
									Edit Profile
								</button>
								<li><a href="<?=base_url('Admin/Cadmin/logout')?>" class="dropdown-item">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <aside id="nav-logo">
                    <img src="<?= base_url('asset/img/logo.png') ?>" alt="findingnemu" style="width: 80px;" class="img-fluid">
                </aside>
            </nav>


			<!--Modal Admin Profile Update-->
			<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Profile Admin</h1>
						</div>
						<div class="modal-body">
							<div class="profile-preview">
								<img src="<?= base_url($this->session->userdata('foto_admin')) ?>"
									 class="img-fluid profile-image-pic rounded-circle"
									 id="imagePreview"
									 width="100px"
									 alt=""
									 onerror="this.src='https://imagetolink.com/ib/Zn9U9bxCzF.png'; this.onerror='';"
								>
							</div>
							<div class="profile-upload">
							<?php echo form_open_multipart('Admin/Cadmin/uploadprofile', ['class' => 'container mt-3']); ?>
							<input type="hidden"
								   class="form-control"
								   name="id_admin"
								   value="<?php echo $this->session->userdata('id_admin'); ?>"
							>
							<input type="hidden"
								   class="form-control"
								   name="old_photo"
								   value="<?php echo $this->session->userdata('foto_admin'); ?>"
							>
							<label for="userImage">
								Masukan Profile Baru Anda
							</label>
							<input
								type="file"
								class="form-control"
								name="userImage"
								id="userImage"
								required
								accept="image/jpeg, image/png"
							/>
							<br>
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit">Unggah Foto</button>
									<button class="btn btn-default" id="batal" type="reset">Batal</button>
								</span>
								<?php echo form_close(); ?>
							</div>
							<hr class="bg-danger border-2 border-top border-danger" />
							<div class="row mt-3">
								<div class="d-flex">
										<div class="p-2 g-col-6">
											Nama
										</div>
									<!--Username Update-->
									<div class="input-group">
										<?php echo form_open_multipart('Admin/Cadmin/updateusername', ['class' => 'input-group ']); ?>
										<input type="hidden"
											   class="form-control"
											   name="id_admin"
											   value="<?php echo $this->session->userdata('id_admin'); ?>"
										>
										<input type="text"
											   class="form-control"
											   name="username"
											   required
											   placeholder="<?php echo $this->session->userdata('nama_admin'); ?>"
										>
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit">Edit</button>
											<button class="btn btn-default" type="reset">Batal</button>
										</span>
										<?php echo form_close(); ?>
									</div>
									<!--End Username Update-->
								</div>
							</div>
							<div class="row mt-3">
								<div class="d-flex">
									<div class="p-2 g-col-6">
										Email
									</div>
									<!--Email Update-->
									<?php echo form_open_multipart('Admin/Cadmin/updateemail', ['class' => 'input-group ']); ?>
									<div class="input-group">
										<input type="hidden"
											   class="form-control"
											   name="id_admin"
											   value="<?php echo $this->session->userdata('id_admin'); ?>"
										>
										<input type="email"
											   class="form-control"
											   name="email"
											   required
											   placeholder="<?php echo $this->session->userdata('email_admin'); ?>"
										>
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit">Edit</button>
											<button class="btn btn-default" type="reset">Batal</button>
										</span>
										<?php echo form_close(); ?>
									</div>
									<!--End Email Update-->
								</div>
							</div>
							<br>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script>
				document.getElementById('userImage').onchange = function (){
					document.getElementById("imagePreview").src = URL.createObjectURL(userImage.files[0]);
				}

				document.getElementById('batal').onclick = function (){
					document.getElementById("imagePreview").src = "<?= base_url($this->session->userdata('foto_admin')) ?>"
				}
			</script>





