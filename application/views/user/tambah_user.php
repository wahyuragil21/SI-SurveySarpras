 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<div class="content-header">
 		<div class="container-fluid">
 			<div class="row mb-2">
 				<div class="col-sm-6">
 					<h1 class="m-0">Tambah User</h1>
 				</div>
 			</div>
 		</div>
 	</div>
 	<!-- /.content-header -->

 	<!-- Main content -->
 	<div class="content">
 		<!-- /.container-fluid -->
 		<div class="container-fluid">
 			<form action="<?= base_url('user/tambah_aksi') ?>" method="POST">
 				<div class="form-group">
 					<label>Nim</label>
 					<input type="text" name="nim" class="form-control">
 					<?= form_error('nim', '<div class="text-small text-danger">', '</div>'); ?>
 				</div>
 				<div class="form-group">
 					<label>Nama</label>
 					<input type="text" name="nama" class="form-control">
 					<?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
 				</div>
				 <div class="dropdown">
 					<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
 						Prodi
 					</button>
 					<div class="dropdown-menu">
 						<button class="dropdown-item" type="button">Manajemen Informatika</button>
 						<button class="dropdown-item" type="button">Sistem Informasi</button>

 					</div>
 					<br><br>
 					<input type="text" name="prodi" class="form-control">

 				</div>
 				<!-- <div class="form-group">
 					<label>Prodi</label>
 					<input type="text" name="prodi" class="form-control">
 					<?= form_error('prodi', '<div class="text-small text-danger">', '</div>'); ?>
 				</div> -->
 				<div class="form-group">
 					<label>Angkatan</label>
 					<input type="text" name="angkatan" class="form-control">
 					<?= form_error('angkatan', '<div class="text-small text-danger">', '</div>'); ?>
 				</div>
 				<div class="form-group">
 					<label>Username</label>
 					<input type="text" name="username" class="form-control">
 					<?= form_error('username', '<div class="text-small text-danger">', '</div>'); ?>
 				</div>
 				<div class="form-group">
 					<label>Password</label>
 					<input type="text" name="password" class="form-control">
 					<?= form_error('password', '<div class="text-small text-danger">', '</div>'); ?>
 				</div>

 				<div class="dropdown">
 					<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
 						Level
 					</button>
 					<div class="dropdown-menu">
 						<button class="dropdown-item" type="button">Admin</button>
 						<button class="dropdown-item" type="button">Mahasiswa</button>

 					</div>
 					<br>
 					<br>
 					<input type="text" name="level" class="form-control">

 					<br><br>
 					<!-- <div class="form-group">
 					<label>Level</label>
 					<input type="text" name="level" class="form-control">
 					<?= form_error('level', '<div class="text-small text-danger">', '</div>'); ?>
 				</div> -->
 					<button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
 					<button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i> Reset</button>
 					<button type='button' class='btn btn-danger '><i class="fas fa-times"></i> <a href="<?= base_url('user/index') ?>" class="text-light">Tutup</a></button>

 			</form>
 		</div>
 		<!-- /.container-fluid -->
 	</div>
 	<!-- /Main content -->
 </div>
 <!-- Content Wrapper. Contains page content -->

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
 	<!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->