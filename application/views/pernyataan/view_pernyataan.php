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
                         <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard_admin') ?>">Home</a></li>
                         <li class="breadcrumb-item active"><a href="<?php echo base_url('semester') ?>">Semester</a></li>
                         <li class="breadcrumb-item active"><a href="<?php echo base_url('fasilitas/semester/' . $id_semester) ?>">Fasilitas</a></li>
                         <li class="breadcrumb-item active"><a href="<?php echo base_url('pernyataan') ?>"></a>Pernyataan</li>
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
                     <a href="<?= base_url('pernyataan/tambah/' . $fasilitas . '/' . $id_semester) ?>" class="btn btn-info"><i class="fas fa-user-plus"></i> Tambah pernyataan</a>
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                         <thead>
                             <tr class="text-center">
                                 <th>No</th>
                                 <th>Pernyataan</th>
                                 <th width="100px">Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $no = 1;
                                foreach ($pernyataan as $pyt) : ?>
                                 <tr class="text-center">
                                     <td><?= $no++ ?></td>
                                     <td><?= $pyt->pernyataan ?> </td>
                                     <td>
                                         <button data-toggle="modal" data-target="#edit<?= $pyt->id_pernyataan ?>" class="btn btn-warning btn-sm"><i class="fas fa-wrench"></i></button>
                                         <a href="<?= base_url('pernyataan/delete/' . $pyt->id_pernyataan . '/' . $fasilitas . '/' . $id_semester) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus pernyataan ini.?')"><i class="fas fa-trash"></i></a>
                                     </td>
                                 </tr>
                             <?php endforeach ?>
                         </tbody>
                     </table>
                 </div>
             </div>

             <!-- Modal edit-->
             <?php foreach ($pernyataan as $pyt) : ?>
                 <div class="modal fade" id="edit<?= $pyt->id_pernyataan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Update Data Pernyataan</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                 <form action="<?= base_url('pernyataan/edit/' . $pyt->id_pernyataan) ?>" method="POST">
                                     <div class="form-group">
                                         <input type="hidden" name="id_fasilitas" class="form-control" value="<?= $pyt->id_fasilitas ?>">
                                         <input type="hidden" name="id_semester" class="form-control" value="<?= $id_semester ?>">
                                         <?= form_error('fasilitas', '<div class="text-small text-danger">', '</div>'); ?>
                                     </div>
                                     <div class="form-group">
                                         <label>Pernyataan</label>
                                         <input type="text" name="pernyataan" class="form-control" value="<?= $pyt->pernyataan ?>">
                                         <?= form_error('pernyataan', '<div class="text-small text-danger">', '</div>'); ?>
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