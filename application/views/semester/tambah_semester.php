 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Tambah Semester</h1>
                 </div>
             </div>
         </div>
     </div>
     <!-- /.content-header -->

     <!-- Main content -->
     <div class="content">
         <!-- /.container-fluid -->
         <div class="container-fluid">
             <form action="<?= base_url('semester/tambah_aksi') ?>" method="POST">
                 <div class="form-group">
                     <label>Semester</label>
                     <input type="text" name="semester" class="form-control">
                     <?= form_error('semester', '<div class="text-small text-danger">', '</div>'); ?>
                 </div>
                 <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
                 <button type='button' class='btn btn-danger '><i class="fas fa-times"></i> <a href="<?= base_url('semester/index') ?>" class="text-light">Tutup</a></button>


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