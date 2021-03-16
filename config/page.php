<?php
    if(isset($_GET['backup_app'])){
        include ('proses/backup_app.php');
    }
    else if(isset($_GET['backup_db'])){
        include ('proses/backup_db.php');
    }
    else if(isset($_GET['jenis_jasa'])){
        $master = $jenis_jasa = true;
        $views = 'views/master/jenis_jasa.php';
    }
    else if(isset($_GET['pengguna'])){
        $master = $pengguna = true;
        $views = 'views/master/pengguna.php';
    }
    else if(isset($_GET['transaksi'])){
        $transaksi = true;
        $views = 'views/transaksi.php';
    }
    else if(isset($_GET['laporan'])){
        $laporan = true;
        $views = 'views/laporan.php';
    }
    else{
        $home = true;
        $views = 'views/home.php';
    }
?>