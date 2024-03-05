<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN SURVEY PER-FASILITAS SEMESTER GANJIL 2021</title>
</head>

<body>
               
    <p text align="center">LAPORAN HASIL SURVEY PER-FASILITAS SEMESTER GANJIL 2021</p>
    <hr class="line_title">
    <table border="1" width="100%" style="text-align:center;">
        <tr>
            <th>No</th>
            <th>Fasilitas</th>
            <th>Hasil</th>
            <th>Ket</th>
        </tr>
        <?php $no = 1;
        foreach ($fasilitas as $flt) :
            $hasil = $nilai[$flt->id_fasilitas];
            if ($hasil >= 80) {
                $ket = 'Sangat Memuaskan';
            } elseif ($hasil >= 60) {
                $ket = 'Memuaskan';
            } elseif ($hasil >= 40) {
                $ket = 'Cukup';
            } elseif ($hasil >= 20) {
                $ket = 'Kurang';
            } else {
                $ket = 'Sangat Kurang';
            } ?>
            <tr class="text-center">
                <td><?= $no++ ?></td>
                <td><?= $flt->fasilitas ?> </td>
                <td><?= round($hasil) ?>%</td>
                <td><?= $ket ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <br>
    <br>
    <p>KETERANGAN :</p>
    <p>80%-100% = Sangat Memuaskan</p>
    <p>60%-79% = Memuaskan</p>
    <p>40%-59% = Cukup </p>
    <p>20%-39% = Kurang</p>
    <p>0%-19% = Sangat Kurang </p>
</body>

</html>