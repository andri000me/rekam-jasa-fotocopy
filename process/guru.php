<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');
//proses tambah
if(isset($_POST['tambah'])){
    $guru_nip = $_POST['guru_nip'];
    $guru_nama = $_POST['guru_nama'];

    
    $insert = mysqli_query($con,"INSERT INTO guru (guru_nip, guru_nama) VALUES ('$guru_nip','$guru_nama')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data guru';
    }else{
        $error = 'Gagal menambahkan data guru';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?guru');
}
//proses aktifkan akun
if(isset($_POST['aktifkan-akun'])){
    $id = $_POST['idguru'];
    $data_guru = mysqli_fetch_array(mysqli_query($con,"SELECT guru_nip,guru_nama FROM guru WHERE idguru='$id'")) or die(mysqli_error($con));
    list($nip,$nama) = $data_guru;
    $username = $nip;
    $nama = $nama;
    $level = $_POST['level'];
    $password = password_hash($nip,PASSWORD_DEFAULT);

    $cek = mysqli_query($con,"SELECT * FROM pengguna WHERE username='$username'") or die(mysqli_error($con));
    if(mysqli_num_rows($cek)==0){
        $insert = mysqli_query($con,"INSERT INTO pengguna (nama_lengkap, username, password, level) VALUES ('$nama','$username','$password','$level')") or die (mysqli_error($con));
        if($insert){
            $success = 'Berhasil menambahkan data pengguna';
        }else{
            $error = 'Gagal menambahkan data pengguna';
        }
    }else{
        $error = 'Username telah terdaftar !';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?guru');
}
//proses hapus
if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    $id = decrypt($_GET['id']);
    $query = mysqli_query($con, "DELETE FROM guru WHERE idguru='$id'")or die(mysqli_error($con));
    if($query){
        $success = 'Berhasil menghapus data guru';
    }else{
        $error = 'Gagal menghapus data guru';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?guru');
}

?>