<?php
session_start();
include ('../config/conn.php');

if(isset($_POST['tapel_id'])){
    $tapel_id = $_POST['tapel_id'];
    $mapel_id = $_POST['mapel_id'];
    $query = mysqli_query($con,"SELECT x.*,x1.*,x2.*,SUM(x.hadir) AS t_hadir, SUM(x.sakit) AS t_sakit,SUM(x.ijin) AS t_ijin,SUM(x.alpa) AS t_alpa FROM absen x JOIN siswa x1 ON x.siswa_id=x1.idsiswa JOIN kelas x2 ON x1.kelas_id=x2.idkelas WHERE x.tahun_pelajaran_id='".$tapel_id."' AND x.mata_pelajaran_id='".$mapel_id."' GROUP BY x.siswa_id ORDER BY x1.siswa_nama ASC")or die(mysqli_error($con));
    $data = '';
    $n=1;
    while($row = mysqli_fetch_array($query)){
        $data .='<tr>';
        $data .='<td>'.$n++.'</td>';
        $data .='<td>'.$row['siswa_nisn'].' - '.$row['siswa_nis'].'</td>';
        $data .='<td>'.$row['siswa_nama'].'</td>';
        $data .='<td>'.$row['siswa_jk'].'</td>';
        $data .='<td>'.$row['kelas_kode'].'</td>';
        $data .='<td>'.$row['t_hadir'].'</td>';
        $data .='<td>'.$row['t_sakit'].'</td>';
        $data .='<td>'.$row['t_ijin'].'</td>';
        $data .='<td>'.$row['t_alpa'].'</td>';
        $data .='</tr>';
    }
    echo json_encode($data);
}
?>