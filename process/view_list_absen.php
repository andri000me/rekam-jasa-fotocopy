<?php
session_start();
include ('../config/conn.php');

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $mapel = mysqli_fetch_array(mysqli_query($con,"SELECT kelas_id FROM mata_pelajaran WHERE idmata_pelajaran='$id'")) or die(mysqli_error($con));
    $query = mysqli_query($con,"SELECT * FROM siswa x JOIN kelas x1 ON x.kelas_id=x1.idkelas WHERE x.kelas_id='".$mapel['kelas_id']."' ORDER BY siswa_nama ASC")or die(mysqli_error($con));
    $data = '';
    $n=1;
    while($row = mysqli_fetch_array($query)){
        $data .='<tr>';
        $data .='<td>'.$n++.'</td>';
        $data .='<td>'.$row['siswa_nisn'].' - '.$row['siswa_nis'].'</td>';
        $data .='<td>'.$row['siswa_nama'].'</td>';
        $data .='<td>'.$row['siswa_jk'].'</td>';
        $data .='<td>'.$row['kelas_kode'].'</td>';
        $data .='<td><input type="checkbox" name="hadir'.$row['idsiswa'].'" id="hadir'.$row['idsiswa'].'" value="1" class="form-control" onclick="checkHadir('.$row['idsiswa'].')" required></td>';
        $data .='<td><input type="checkbox" name="sakit'.$row['idsiswa'].'" id="sakit'.$row['idsiswa'].'" value="1" class="form-control" onclick="checkSakit('.$row['idsiswa'].')" required></td>';
        $data .='<td><input type="checkbox" name="ijin'.$row['idsiswa'].'" id="ijin'.$row['idsiswa'].'" value="1" class="form-control" onclick="checkIjin('.$row['idsiswa'].')" required></td>';
        $data .='<td><input type="checkbox" name="alpa'.$row['idsiswa'].'" id="alpa'.$row['idsiswa'].'" value="1" class="form-control" onclick="checkAlpa('.$row['idsiswa'].')" required></td>';
        $data .='<td><input type="text" name="keterangan'.$row['idsiswa'].'" class="form-control"></td>';
        $data .='</tr>';
    }
    echo json_encode($data);
}
?>