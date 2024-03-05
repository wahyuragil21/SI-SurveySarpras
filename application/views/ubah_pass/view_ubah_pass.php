 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Ganti Password</h1>
                 </div>
             </div>
         </div>
     </div>
     <!-- /.content-header -->

     <!-- Main content -->
     <div class="content">
         <!-- /.container-fluid -->
         <div class="container-fluid">

             <!-- 
             <div class="row justify-content-center">
                 <div class="col-6">
                     <h1><?php echo $title ?></h1>
                     <?php echo form_open('users/changePassword', array('id' => 'passwordForm')) ?>
                     <div class="form-group">
                         <input type="password" name="oldpass" id="oldpass" class="form-control" placeholder="Old Password" />
                         <?php echo form_error('oldpass', '<div class="error">', '</div>') ?>
                     </div>
                     <div class="form-group">
                         <input type="password" name="newpass" id="newpass" class="form-control" placeholder="New Password" />
                         <?php echo form_error('newpass', '<div class="error">', '</div>') ?>
                     </div>
                     <div class="form-group">
                         <input type="password" name="passconf" id="passconf" class="form-control" placeholder="Confirm Password" />
                         <?php echo form_error('passconf', '<div class="error">', '</div>') ?>
                     </div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-success">Change Password</button>
                     </div>
                     <?php echo form_close(); ?>
                 </div>
             </div> -->


             <?= $this->session->flashdata('pesan'); ?>
             <form action="<?= base_url('ubah_pass/ubah_pass_aksi') ?>" method="POST">
                 <!-- <div class="form-group">
                     <label for="password_lama">Password Lama</label>
                     <input type="password" class="form-control" id="password_lama" name="password_lama">
                     <?= form_error('password_lama', '<div class="text-small text-danger">', '</div>'); ?>
                 </div> -->
                 <div class="form-group">
                     <label for="pass_baru">Password Baru</label>
                     <input type="password" class="form-control" id="pass_baru" name="password">
                     <?= form_error('pass_baru', '<div class="text-small text-danger">', '</div>'); ?>
                 </div>
                 <div class="form-group">
                     <label for="ulangi_pass">Konfirmasi Password Baru</label>
                     <input type="password" class="form-control" id="ulangi_pass" name="password">
                     <?= form_error('ulangi_pass', '<div class="text-small text-danger">', '</div>'); ?>
                 </div>
                 <div class="form-group">
                     <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Ganti Password </button>
                     <button type='button' class='btn btn-danger '><i class="fas fa-times"></i> <a href="<?= base_url('Dashboard_user') ?>" class="text-light">Tutup</a></button>

                 </div>
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