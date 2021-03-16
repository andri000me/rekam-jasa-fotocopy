<?php
// session_start();
include ('../config/conn.php');
include ('../config/function.php');
?>
<html>

<head>
    <style>
    h2 {
        font-size: 16pt;
    }

    h4 {
        font-size: 12pt;
    }

    text {
        padding: 0px;
    }

    table {
        border-collapse: collapse;
        border: 1px solid #000;
        font-size: 11pt;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 5px;
    }

    table.tab {
        table-layout: auto;
        width: 100%;
    }
    </style>
    <title>Cetak Semua Santri Putra</title>
</head>

<body>
    <?php
    $tapel_id = $_GET['tahun_pelajaran_id'];
    $mapel_id = $_GET['mata_pelajaran_id'];
    $query = mysqli_query($con,"SELECT x.*,x1.*,x2.*,SUM(x.hadir) AS t_hadir, SUM(x.sakit) AS t_sakit,SUM(x.ijin) AS t_ijin,SUM(x.alpa) AS t_alpa FROM absen x JOIN siswa x1 ON x.siswa_id=x1.idsiswa JOIN kelas x2 ON x1.kelas_id=x2.idkelas WHERE x.tahun_pelajaran_id='".$tapel_id."' AND x.mata_pelajaran_id='".$mapel_id."' GROUP BY x.siswa_id ORDER BY x1.siswa_nama ASC")or die(mysqli_error($con));
    
    ?>
    <div style="page-break-after:always;text-align:center;margin-top:5%;">
        <h2>DATA REKAPITULASI ABSENSI</h2>
        <br>
        <table class="tab">
            <tr>
                <th width="20">NO</th>
                <th>NIS - NISN</th>
                <th>NAMA SISWA</th>
                <th>JK</th>
                <th>KELAS</th>
                <th>HADIR</th>
                <th>SAKIT</th>
                <th>IJIN</th>
                <th>ALPA</th>
            </tr>
            <?php $n=1; while($row = mysqli_fetch_array($query)): ?>
            <tr>
                <td align="center"><?= $n++.'.'; ?></td>
                <td><?= $row['siswa_nis'].' - '.$row['siswa_nisn']; ?></td>
                <td><?= $row['siswa_nama']; ?></td>
                <td align="center"><?= $row['siswa_jk']; ?></td>
                <td align="center"><?= $row['kelas_kode']; ?></td>
                <td align="center"><?= $row['t_hadir']; ?></td>
                <td align="center"><?= $row['t_sakit']; ?></td>
                <td align="center"><?= $row['t_ijin']; ?></td>
                <td align="center"><?= $row['t_alpa']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>

</html>

<script>
window.print();
</script>