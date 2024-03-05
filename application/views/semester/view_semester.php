 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Management Pernyataan</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Semester</li>
                     </ol>
                 </div>
             </div>
         </div>
     </div>
     <!-- /.content-header -->

     <!-- Main content -->
     <div class="content">
         <!-- /.container-fluid -->
         <div class="container-fluid">
             <?= $this->session->flashdata('pesan'); ?>
             <div class="card">
                 <div class="card-header">
                     <a href="<?= base_url('semester/tambah') ?>" class="btn btn-info"><i class="fas fa-user-plus"></i> Tambah Semester</a>
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                         <thead>
                             <tr class="text-center">
                                 <th>No</th>
                                 <th>Semester</th>
                                 <th>Status</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $no = 1;
                                foreach ($semester as $smt) : ?>
                                 <tr class="text-center">
                                     <td><?= $no++ ?></td>
                                     <td><?= $smt->semester ?> </td>
                                     <td><?= $smt->status ?> </td>
                                     <td>
                                         <a href="<?= base_url('fasilitas/semester/' . $smt->id) ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                         <button data-toggle="modal" data-target="#edit<?= $smt->id ?>" class="btn btn-warning btn-sm"><i class="fas fa-wrench"></i></button>
                                         <a href="<?= base_url('semester/delete/' . $smt->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus semester ini.?')"><i class="fas fa-trash"></i></a>
                                     </td>
                                 </tr>
                             <?php endforeach ?>
                         </tbody>
                     </table>
                 </div>
             </div>

             <!-- Modal edit-->
             <?php foreach ($semester as $smt) : ?>
                 <div class="modal fade" id="edit<?= $smt->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Update Data Semester</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                 <form action="<?= base_url('semester/edit/' . $smt->id) ?>" method="POST">
                                     <div class="form-group">
                                         <label>Semester</label>
                                         <input type="text" name="semester" class="form-control" value="<?= $smt->semester ?>">
                                         <?= form_error('semester', '<div class="text-small text-danger">', '</div>'); ?>
                                     </div>
                                     <!-- <div class="form-group">
                                         <label>Status</label>
                                         <input type="text" name="status" class="form-control" value="<?= $smt->status ?>">
                                         <?= form_error('status', '<div class="text-small text-danger">', '</div>'); ?>
                                     </div> -->
                                     <div class="form-group">
                                         <label for="status">Status</label>
                                         <input type="text" name="status" class="form-control">
                                         <?= form_error('status', '<div class="text-small text-danger">', '</div>'); ?>
                                     </div>
                                     <div class="modal-footer">
                                         <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
                                         <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             <?php endforeach ?>

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