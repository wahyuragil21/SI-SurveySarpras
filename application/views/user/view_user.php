 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Management User</h1>
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
       <?= $this->session->flashdata('pesan'); ?>
       <div class="card">
         <div class="card-header">
           <a href="<?= base_url('user/tambah') ?>" class="btn btn-info"><i class="fas fa-user-plus"></i> Tambah User</a>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
           <table id="example1" class="table table-bordered table-striped">
             <thead>
               <tr class="text-center">
                 <th>No</th>
                 <th>Nim</th>
                 <th>Nama</th>
                 <th>Prodi</th>
                 <th>Angkatan</th>
                 <th>Username</th>
                 <th>Level</th>
                 <th>Action</th>
               </tr>
             </thead>
             <?php $no = 1;
              foreach ($user as $usr) : ?>
               <tbody>
                 <tr class="text-center">
                   <td><?= $no++ ?></td>
                   <td><?= $usr->nim ?> </td>
                   <td><?= $usr->nama ?> </td>
                   <td><?= $usr->prodi ?> </td>
                   <td><?= $usr->angkatan ?> </td>
                   <td><?= $usr->username ?></td>
                   <td><?= $usr->level ?></td>
                   <td>
                     <button data-toggle="modal" data-target="#edit<?= $usr->id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                     <a href="<?= base_url('user/delete/' . $usr->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus user ini.?')"><i class="fas fa-trash"></i></a>
                   </td>
                 </tr>
               </tbody>
             <?php endforeach ?>
           </table>
         </div>
       </div>

       <!-- Modal edit-->
       <?php foreach ($user as $usr) : ?>
         <div class="modal fade" id="edit<?= $usr->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Update Data User</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                 <form action="<?= base_url('user/edit/' . $usr->id) ?>" method="POST">
                   <div class="form-group">
                     <label>Nim</label>
                     <input type="text" name="nim" class="form-control" value="<?= $usr->nim ?>">
                     <?= form_error('nim', '<div class="text-small text-danger">', '</div>'); ?>
                   </div>
                   <div class="form-group">
                     <label>Nama</label>
                     <input type="text" name="nama" class="form-control" value="<?= $usr->nama ?>">
                     <?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
                   </div>
                   <div class="form-group">
                     <label>Prodi</label>
                     <input type="text" name="prodi" class="form-control" value="<?= $usr->prodi ?>">
                     <?= form_error('prodi', '<div class="text-small text-danger">', '</div>'); ?>
                   </div>
                   <div class="form-group">
                     <label>Angkatan</label>
                     <input type="text" name="angkatan" class="form-control" value="<?= $usr->angkatan ?>">
                     <?= form_error('angkatan', '<div class="text-small text-danger">', '</div>'); ?>
                   </div>
                   <div class="form-group">
                     <label>Username</label>
                     <input type="text" name="username" class="form-control" value="<?= $usr->username ?>">
                     <?= form_error('username', '<div class="text-small text-danger">', '</div>'); ?>
                   </div>
                   <div class="form-group">
                     <label>Password</label>
                     <input type="text" name="password" class="form-control" value="<?= $usr->password ?>">
                     <?= form_error('password', '<div class="text-small text-danger">', '</div>'); ?>
                   </div>
                   <div class="form-group">
                     <label>Level</label>
                     <input type="text" name="level" class="form-control" value="<?= $usr->level ?>">
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

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->