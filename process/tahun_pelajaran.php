<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');
//proses tambah
if(isset($_POST['tambah'])){
    $nama_tapel = $_POST['nama_tapel'];
    $semester_tapel = $_POST['semester_tapel'];

    
    $insert = mysqli_query($con,"INSERT INTO tahun_pelajaran (nama_tapel, semester_tapel) VALUES ('$nama_tapel','$semester_tapel')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data tahun pelajaran';
    }else{
        $error = 'Gagal menambahkan data tahun pelajaran';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?tahun_pelajaran');
}
//proses hapus
if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    $id = decrypt($_GET['id']);
    $query = mysqli_query($con, "DELETE FROM tahun_pelajaran WHERE idtahun_pelajaran='$id'")or die(mysqli_error($con));
    if($query){
        $success = 'Berhasil menghapus data tahun pelajaran';
    }else{
        $error = 'Gagal menghapus data tahun pelajaran';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?tahun_pelajaran');
}

?>