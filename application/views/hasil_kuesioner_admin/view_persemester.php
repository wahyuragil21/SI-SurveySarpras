 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Laporan Hasil Survei</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Laporan Data</li>
                     </ol>
                 </div>
             </div>
         </div>
         <ul class="nav nav-pills">
             <li class="nav-item">
                 <a href="<?= base_url('diagram_hasil') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'diagram_hasil') echo 'active' ?>">Laporan Diagram</a>
             </li>
             <li class="nav-item">
                 <a href="<?= base_url('laporan_persemester') ?>" style="background-color: #0093AB;" class="nav-link <?php if ($this->uri->segment(1) == 'laporan_persemester') echo 'active' ?>">Laporan Data</a>
             </li>
         </ul>
     </div>
     <!-- /.content-header -->

     <!-- Main content -->
     <div class="content">
         <!-- /.container-fluid -->
         <div class="container-fluid">
             <div class="card">
                 <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                         <thead>
                             <tr class="text-center">
                                 <th>No</th>
                                 <th>Semester</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $no = 1;
                                foreach ($semester as $smt) : ?>
                                 <tr class="text-center">
                                     <td><?= $no++ ?></td>
                                     <td><?= $smt->semester ?> </td>
                                     <td>

                                         <a href="<?= base_url('laporan_perfasilitas/semester/' . $smt->id) ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                         <!-- <button data-toggle="modal" data-target="#edit" class="btn btn-success btn-sm"><i class="fas fa-print"></i></button> -->
                                     </td>
                                 </tr>
                             <?php endforeach ?>
                         </tbody>
                     </table>
                 </div>
             </div>

         </div>
         <!-- /.container-fluid -->
     </div>
     <!-- /Main content -->
 </div>
 <!-- Content Wrapper. Contains page content -->