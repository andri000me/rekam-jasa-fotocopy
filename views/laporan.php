<?php hakAkses(['admin','wali_kelas','guru']) ?>
<?php
date_default_timezone_set("Asia/Jayapura");
?>
<script>
function tampilkan() {
    let tapel_id = $('#tahun_pelajaran_id').val();
    let mapel_id = $('#mata_pelajaran_id').val();
    $.ajax({
        type: "POST",
        data: {
            tapel_id: tapel_id,
            mapel_id: mapel_id
        },
        url: '<?=base_url();?>process/view_list_laporan.php',
        dataType: 'json',
        success: function(data) {
            $('#listArea').html(data);
        }
    });
}

function btnShow() {
    let val = $('[name="mata_pelajaran_id"]').val();
    if (val != '') {
        $('#buttonPrint').show();
    } else {
        $('#buttonPrint').hide();
    }
}
</script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="<?=base_url();?>process/cetak_laporan.php?" method="get" target="_blank">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="tahun_pelajaran_id" id="tahun_pelajaran_id" class="form-control select2"
                                style="width:100%;" required>
                                <?= list_tapel(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="mata_pelajaran_id" id="mata_pelajaran_id" class="form-control select2"
                                style="width:100%;" onchange="btnShow()" required>
                                <option value="">-- Pilih Mata Pelajaran --</option>
                                <?= list_mapel(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <button class="btn btn-sm btn-primary" type="button" onclick="tampilkan()"><i
                                class="fas fa-eye"></i>
                            Tampilkan</button>
                        <button type="submit" class="btn btn-sm btn-info" id="buttonPrint"><i class="fas fa-print"></i>
                            Cetak</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTabl" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20">NO</th>
                            <th>NISN/NIS</th>
                            <th>NAMA SISWA</th>
                            <th>JK</th>
                            <th>KELAS</th>
                            <th>HADIR</th>
                            <th>SAKIT</th>
                            <th>IJIN</th>
                            <th>ALPA</th>
                        </tr>
                    </thead>
                    <tbody id="listArea">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->