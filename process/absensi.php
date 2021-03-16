<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['simpan'])){
    $tahun_pelajaran_id = $_POST['tahun_pelajaran_id'];
    $mata_pelajaran_id = $_POST['mata_pelajaran_id'];
    $tanggal = $_POST['tanggal'];
    $pengguna_id = $_SESSION['iduser'];

    $cek = mysqli_query($con,"SELECT * FROM absen WHERE tahun_pelajaran_id='$tahun_pelajaran_id' AND mata_pelajaran_id='$mata_pelajaran_id' AND tanggal='$tanggal'") or die(mysqli_error($con));
    if(mysqli_num_rows($cek)==0){
        $mapel = mysqli_fetch_array(mysqli_query($con,"SELECT kelas_id FROM mata_pelajaran WHERE idmata_pelajaran='$mata_pelajaran_id'")) or die(mysqli_error($con));
        $query = mysqli_query($con,"SELECT * FROM siswa x JOIN kelas x1 ON x.kelas_id=x1.idkelas WHERE x.kelas_id='".$mapel['kelas_id']."' ORDER BY siswa_nama ASC")or die(mysqli_error($con));
        while($row = mysqli_fetch_array($query)){
            $siswa_id = $row['idsiswa'];
            $hadir = isset($_POST['hadir'.$row['idsiswa']])?$_POST['hadir'.$row['idsiswa']]:0;
            $sakit = isset($_POST['sakit'.$row['idsiswa']])?$_POST['sakit'.$row['idsiswa']]:0;
            $ijin = isset($_POST['ijin'.$row['idsiswa']])?$_POST['ijin'.$row['idsiswa']]:0;
            $alpa = isset($_POST['alpa'.$row['idsiswa']])?$_POST['alpa'.$row['idsiswa']]:0;
            $keterangan = isset($_POST['keterangan'.$row['idsiswa']])?$_POST['keterangan'.$row['idsiswa']]:0;

            mysqli_query($con,"INSERT INTO absen (tahun_pelajaran_id, mata_pelajaran_id, siswa_id, tanggal, hadir, sakit, ijin, alpa, keterangan, pengguna_id) VALUES ('$tahun_pelajaran_id','$mata_pelajaran_id','$siswa_id','$tanggal','$hadir','$sakit','$ijin','$alpa','$keterangan','$pengguna_id')") or die (mysqli_error($con));
        }
    }else{
        $error = 'Maaf, Anda telah melakukan absensi untuk tanggal '.$tanggal;
    }
    $success = 'Berhasil melakukan absensi untuk tanggal '.$tanggal;

    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?absensi');
}

?>