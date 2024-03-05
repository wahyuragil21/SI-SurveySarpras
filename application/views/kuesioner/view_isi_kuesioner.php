<?php
// $nama = 'wahyu';
// $umur = 21;

// echo 'Nama = ' . $nama . '<br>';
// echo 'Umur = ' . $umur . '<br><br>';

// $mahasiswa = ['wahyu', 'adit', 'hafid'];
// $mahasiswa2 = ['wahyu2', 'adit2'];
// var_dump($mahasiswa);
// echo '<br><br>';
// print_r($mahasiswa);
// echo '<br><br>';
// echo $mahasiswa[2];
// echo '<br><br>';

// $dosen = [];
// $dosen['d1']['nama'] = 'wahyu';
// $dosen['d1']['nim'] = '1903035087';
// $dosen['d2']['nama'] = 'adit';
// $dosen['d2']['nim'] = '1903035608';


// print_r($dosen);
// echo '<br><br>';

// $fasilitas = [];
// $fasilitas['g1']['nama'] = 'fasilitas 1';
// $fasilitas['g1']['pernyataan'] = $mahasiswa;
// $fasilitas['g2']['nama'] = 'fasilitas 2';
// $fasilitas['g2']['pernyataan'] = $mahasiswa2;
// print_r($fasilitas);

// echo '<br><br>';
// echo $fasilitas['g2']['nama'];


// foreach ($fasilitas as $key => $value) {
//     echo $value['nama'] . '<br>';
//     foreach ($value['pernyataan'] as $key2 => $value2) {
//         echo $value2;
//     }
// }
// echo '<br><br>';
// 
?>


<?php
// $fruits = array('apple', 'banana', 'orange', 'grapes');
// foreach ($fruits as $fruit) {
//     echo $fruit;
//     echo "<br/>";
// }

// $employee = array('name' => 'John Smith', 'age' => 30, 'profession' => 'Software Engineer');
// foreach ($employee as $key => $value) {
//     echo sprintf("%s: %s</br>", $key, $value);
//     echo "<br/>";
// }
// echo '<br><br>';

?>

<?php
// $employee = [
//     'name' => 'John',
//     'email' => 'john@example.com',
//     'phone' => '1234567890',
// ];

// // get the value of employee name
// echo $employee['name'];

// // get all values
// foreach ($employee as $key => $value) {
//     echo $key . ':' . $value;
//     echo '<br>';
// }
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Isi Kuesioner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard_user') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Isi Kuesioner</li>
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
            <form action="<?= base_url('isi_kuesioner/simpan') ?>" method="POST">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width='3%'><b>
                                    <font face='Tahoma' size='2'>No</font>
                                </b></th>
                            <th colspan='2'>
                                <p align='center'><b>
                                        <font face='Tahoma' size='2'>DAFTAR PERNYATAAN</font>
                                    </b>
                            </th>
                            <th colspan="5" bgcolor='#006778'>
                                <p align='center'>
                                    <font face='Tahoma' size='2' color='white'>KUALITAS</font>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($model_fasilitas as $key => $fasilitas) : ?>
                            <tr>
                                <td>
                                    <font face='Tahoma' size='2' colspan='1'><b></b></font>
                                </td>
                                <td colspan='2  '>
                                    <font face='Tahoma' size='2'><b><?= $key ?></b></font>
                                </td>
                                <td height='25' width='8%' bgcolor='#0093AB'>
                                    <p align='center'>
                                        <font face='Tahoma' size='1' color='white'>A<br>(Sangat Setuju)</font>
                                </td>
                                <td height='25' width='8%' bgcolor='#0093AB'>
                                    <p align='center'>
                                        <font face='Tahoma' size='1' color='white'>B<br>(Setuju)</font>
                                </td>
                                <td height='25' width='8%' bgcolor='#0093AB'>
                                    <p align='center'>
                                        <font face='Tahoma' size='1' color='white'>C<br>(Ragu-Ragu)</font>
                                </td>
                                <td height='25' width='8%' bgcolor='#0093AB'>
                                    <p align='center'>
                                        <font face='Tahoma' size='1' color='white'>D<br>(Tidak Setuju)</font>
                                </td>
                                <td height='25' width='8%' bgcolor='#0093AB'>
                                    <p align='center'>
                                        <font face='Tahoma' size='1' color='white'>E<br>(Sangat Tidak Setuju)</font>
                                </td>
                            </tr>
                            <?php $no = 1;
                            foreach ($fasilitas as $dsk) :

                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $dsk->pernyataan ?></td>
                                    <td>

                                    </td>
                                    <td align='center'> <input type='radio' name='a[<?= $dsk->id_pernyataan ?>]' value='5'> </td>
                                    <td align='center'> <input type='radio' name='a[<?= $dsk->id_pernyataan ?>]' value='4'> </td>
                                    <td align='center'> <input type='radio' name='a[<?= $dsk->id_pernyataan ?>]' value='3'> </td>
                                    <td align='center'> <input type='radio' name='a[<?= $dsk->id_pernyataan ?>]' value='2'> </td>
                                    <td align='center'> <input type='radio' name='a[<?= $dsk->id_pernyataan ?>]' value='1'> </td>
                                </tr>
                            <?php endforeach ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
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