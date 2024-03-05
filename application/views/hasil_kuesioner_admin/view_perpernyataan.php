 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Laporan Hasil Survei Per-Pernyataan</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                         <!-- <li class="breadcrumb-item active">Laporan Data</li> -->
                         <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard_admin') ?>">Home</a></li>
                         <li class="breadcrumb-item active"><a href="<?php echo base_url('laporan_persemester') ?>">Per-Semester</a></li>
                         <li class="breadcrumb-item active"><a href="#">Per-Fasilitas</a></li>
                         <li class="breadcrumb-item active"><a href="<?php echo base_url('pernyataan') ?>"></a>Per-Pernyataan</li>
                     </ol>
                 </div>
             </div>
         </div>
         <ul class="nav nav-pills">
             <li class="nav-item">
                 <a href="<?= base_url('diagram_hasil') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'diagram_hasil') echo 'active' ?>">Laporan Diagram</a>
             </li>
             <li class="nav-item">
                 <a href="<?= base_url('laporan_perpernyataan') ?>" style="background-color: #0093AB;" class="nav-link <?php if ($this->uri->segment(1) == 'laporan_perpernyataan') echo 'active' ?>">Laporan Data</a>
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
                     <!-- <a class="btn btn-danger " href="<?php echo base_url('laporan_perpernyataan/cetak') ?>"><i class="fa fa-print"> </i> Print</a> -->
                     <!-- <a class="btn btn-success " href="<?php echo base_url('laporan_perpernyataan/print') ?>"><i class="fa fa-print"> </i> Print To EXCEl</a> -->
                     <!-- <br> <br> -->
                     <table id="example1" class="table table-bordered table-striped">
                         <thead>
                             <tr class="text-center">
                                 <th>No</th>
                                 <th>Pernyataan</th>
                                 <!-- <th>Nilai</th> -->
                                 <th>Nilai</th>
                                 <th>Ket</th>
                                 <!-- <th>Action</th> -->
                             </tr>
                         </thead>
                         <tbody>
                             <?php $no = 1;
                                foreach ($pernyataan as $prt) :
                                    $hasil = $nilai[$prt->id_pernyataan] / 5 * 100;
                                    if ($hasil >= 81) {
                                        $ket = 'Sangat Memuaskan';
                                    } elseif ($hasil >= 61) {
                                        $ket = 'Memuaskan';
                                    } elseif ($hasil >= 41) {
                                        $ket = 'Cukup';
                                    } elseif ($hasil >= 21) {
                                        $ket = 'Kurang';
                                    } else {
                                        $ket = 'Sangat Kurang';
                                    } ?>
                                 <tr class>
                                     <td><?= $no++ ?></td>
                                     <td><?= $prt->pernyataan ?> </td>
                                     <!-- <td><?= $nilai[$prt->id_pernyataan] ?></td> -->
                                     <td><?= round($hasil) ?>%</td>
                                     <td><?= $ket ?></td>
                                     <!-- <td> -->
                                     <!-- <a href="#" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a> -->
                                     <!-- <button data-toggle="modal" data-target="#edit" class="btn btn-success btn-sm"><i class="fas fa-print"></i></button> -->
                                     <!-- </td> -->
                                 </tr>
                             <?php endforeach ?>
                         </tbody>
                     </table>
                     <br>
                     <a class="btn btn-danger float-right " href="<?php echo base_url('laporan_perpernyataan/pdf/') . $fasilitas . '/' . $semester ?>"><i class="fa fa-print"> </i> Print To PDF</a>

                     <br>
                     <p text align="left">KETERANGAN :
                     <p>81%-100% = Sangat Memuaskan</p>
                     <p>61%-80% = Memuaskan</p>
                     <p>41%-60% = Cukup</p>
                     <p>21%-40% = Kurang</p>
                     <p>0%-20% = Sangat Kurang </p>
                 </div>
             </div>

         </div>
         <!-- /.container-fluid -->
     </div>
     <!-- /Main content -->
 </div>
 <!-- Content Wrapper. Contains page content -->