<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $mapel_kode = $_POST['mapel_kode'];
    $kelas_id = $_POST['kelas_id'];
    $guru_id = $_POST['guru_id'];
    $mapel_nama = $_POST['mapel_nama'];

    $insert = mysqli_query($con,"INSERT INTO mata_pelajaran (kelas_id, guru_id, mapel_kode, mapel_nama) VALUES ('$kelas_id','$guru_id','$mapel_kode','$mapel_nama')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data mata pelajaran';
    }else{
        $error = 'Gagal menambahkan data mata pelajaran';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?mata_pelajaran');
}

if(isset($_POST['ubah'])){
    $id = $_POST['idmata_pelajaran'];
    $kelas_id = $_POST['kelas_id'];
    $guru_id = $_POST['guru_id'];
    $mapel_kode = $_POST['mapel_kode'];
    $mapel_nama = $_POST['mapel_nama'];

    $update = mysqli_query($con,"UPDATE mata_pelajaran SET kelas_id='$kelas_id', guru_id='$guru_id', mapel_kode='$mapel_kode', mapel_nama='$mapel_nama' WHERE idmata_pelajaran='$id'") or die (mysqli_error($con));
    
    // var_dump($update);die;
    if($update){
        $success = 'Berhasil mengubah data mata pelajaran';
    }else{
        $error = 'Gagal mengubah data mata pelajaran';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?mata_pelajaran');
}

if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    // echo $_GET['act'];die;
    $id = decrypt($_GET['id']);
    $delete = mysqli_query($con, "DELETE FROM mata_pelajaran WHERE idmata_pelajaran='$id'")or die(mysqli_error($con));
    if ($delete) {
        $success = "Data mata pelajaran berhasil dihapus";
    }else{
        $error = "Data mata pelajaran gagal dihapus";
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?mata_pelajaran');
}
?>