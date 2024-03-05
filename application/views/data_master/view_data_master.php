 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Data Master</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Data Master</li>
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
             <div class="card">
                 <!-- /.card-header -->
                 <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                         <thead>
                             <tr class="text-center">
                                 <th>No</th>
                                 <th>Nip</th>
                                 <th>Nama</th>
                                 <th>Level/Jabatan</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <?php $no = 1;
                            foreach ($data_master as $dm) : ?>
                             <tbody>
                                 <tr class="text-center">
                                     <td><?= $no++ ?></td>
                                     <td><?= $dm->nip ?> </td>
                                     <td><?= $dm->nama ?> </td>
                                     <td><?= $dm->level ?></td>
                                     <td>
                                         <button data-toggle="modal" data-target="#edit<?= $dm->id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                         <a href="<?= base_url('data_master/delete/' . $dm->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus user ini.?')"><i class="fas fa-trash"></i></a>
                                     </td>
                                 </tr>
                             </tbody>
                         <?php endforeach ?>
                     </table>
                 </div>
             </div>

             <!-- Modal edit-->
             <?php foreach ($data_master as $dm) : ?>
                 <div class="modal fade" id="edit<?= $dm->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Update Data Master</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                 <form action="<?= base_url('user/edit/' . $dm->id) ?>" method="POST">
                                     <div class="form-group">
                                         <label>Nip</label>
                                         <input type="text" name="nip" class="form-control" value="<?= $dm->nip ?>">
                                         <?= form_error('nip', '<div class="text-small text-danger">', '</div>'); ?>
                                     </div>
                                     <div class="form-group">
                                         <label>Nama</label>
                                         <input type="text" name="nama" class="form-control" value="<?= $dm->nama ?>">
                                         <?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
                                     </div>
                                     <div class="form-group">
                                         <label>Level</label>
                                         <input type="text" name="level" class="form-control" value="<?= $dm->level ?>">
                                         <?= form_error('level', '<div class="text-small text-danger">', '</div>'); ?>
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