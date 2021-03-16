<?php
function session_timeout(){
    //lama waktu 30 menit = 1800
    if(isset($_SESSION['LAST_ACTIVITY'])&&(time()-$_SESSION['LAST_ACTIVITY']>1800)){
        session_unset();
        session_destroy();
        header("Location:".$base_url."login.php");
    }$_SESSION['LAST_ACTIVITY']=time();
}
function delMask( $str ) {
    return (int)implode('',explode('.',$str));
}
function hakAkses( array $a){
    $akses = $_SESSION['level'];
    if(!in_array($akses,$a)){
        // header('Location:?');
        echo '<script>window.location = "?#";</script>';
    }
}
function noTransaksi(){
    include ('conn.php');
    // mencari kode barang dengan nilai paling besar
    $query = "SELECT max(transaksi_no) as maxKode FROM transaksi";
    $hasil = mysqli_query($con,$query);
    $data = mysqli_fetch_array($hasil);
    $kodeBarang = $data['maxKode'];

    // mengambil angka atau bilangan dalam kode anggota terbesar,
    // dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
    // misal 'TRX00001', akan diambil '001'
    // setelah substring bilangan diambil lantas dicasting menjadi integer
    $noUrut = (int) substr($kodeBarang, 3, 5);

    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $noUrut++;

    // membentuk kode anggota baru
    // perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
    // misal sprintf("%03s", 12); maka akan dihasilkan '012'
    // atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
    $char = "TRX";
    $kodeBarang = $char . sprintf("%05s", $noUrut);
    return $kodeBarang;
}

function list_jasa(){
    include ('conn.php');
    $query = mysqli_query($con,"SELECT * FROM jasa ORDER BY jasa_nama ASC");
    $opt = "";
    while($row = mysqli_fetch_array($query)){
        $opt .= "<option value=\"".$row['idjasa']."\">".$row['jasa_nama']." - Rp. ".number_format($row['jasa_harga'],0,'','.')."</option>";
    }  
    return $opt; 
}

function list_guru(){
    include ('conn.php');
    $query = mysqli_query($con,"SELECT * FROM guru ORDER BY guru_nama ASC");
    $opt = "";
    while($row = mysqli_fetch_array($query)){
        $opt .= "<option value=\"".$row['idguru']."\">".$row['guru_nip']." - ".$row['guru_nama']."</option>";
    }  
    return $opt; 
}

function list_tapel(){
    include ('conn.php');
    $query = mysqli_query($con,"SELECT * FROM tahun_pelajaran ORDER BY idtahun_pelajaran DESC");
    $opt = "";
    while($row = mysqli_fetch_array($query)){
        $opt .= "<option value=\"".$row['idtahun_pelajaran']."\">".$row['nama_tapel']."/".$row['semester_tapel']."</option>";
    }  
    return $opt; 
}

function list_mapel(){
    include ('conn.php');
    $mapel = mysqli_query($con,"SELECT * FROM mata_pelajaran x JOIN kelas x1 ON x.kelas_id=x1.idkelas JOIN guru x2 ON x.guru_id=x2.idguru ORDER BY mapel_nama ASC");
    $opt = "";
    while($row2 = mysqli_fetch_array($mapel)){
        $opt .= "<option value=\"".$row2['idmata_pelajaran']."\">".$row2['mapel_kode']." - ".$row2['mapel_nama']." - ".$row2['kelas_kode']."</option>";
    } 
    return $opt; 
}

function list_mapel_by_guru(){
    include ('conn.php');
    $guru = mysqli_fetch_array(mysqli_query($con,"SELECT idguru FROM guru WHERE guru_nip='".$_SESSION['username']."'"));
    $mapel = mysqli_query($con,"SELECT * FROM mata_pelajaran x JOIN kelas x1 ON x.kelas_id=x1.idkelas JOIN guru x2 ON x.guru_id=x2.idguru WHERE x2.idguru='".$guru['idguru']."' ORDER BY mapel_nama ASC");
    $opt = "";
    while($row2 = mysqli_fetch_array($mapel)){
        $opt .= "<option value=\"".$row2['idmata_pelajaran']."\">".$row2['mapel_kode']." - ".$row2['mapel_nama']." - ".$row2['kelas_kode']."</option>";
    } 
    return $opt; 
}

function encrypt($str) {
return base64_encode($str);
}
function decrypt($str) {
return base64_decode($str);
}

function base_url(){
    $base_url= ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $base_url.= "://".$_SERVER['HTTP_HOST'];
    $base_url.= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
    return $base_url;
}
?>