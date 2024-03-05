<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN HASIL SURVEY PER-PERNYATAAN</title>
</head>

<body>
    <p text align="center">LAPORAN HASIL SURVEY PER-PERNYATAAN</p>
    <hr class="line_title">
    <table border="1" width="100%" style="text-align:center;">
        <tr>
            <th>No</th>
            <th>Pernyataan</th>
            <th>Hasil</th>
            <th>Ket</th>
        </tr>
        <?php $no = 1;
        foreach ($pernyataan as $pyt) :
            $hasil = $nilai[$pyt->id_pernyataan] / 5 * 100;
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
                <td><?= $pyt->pernyataan ?> </td>
                <!-- <td><?= $nilai[$pyt->id_pernyataan] ?></td> -->
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