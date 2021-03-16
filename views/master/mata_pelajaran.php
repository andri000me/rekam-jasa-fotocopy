<?php hakAkses(['admin','wali_kelas']) ?>
<script>
function submit(x) {
    if (x == 'add') {
        $('[name="mapel_kode"]').val("");
        $('[name="kelas_id"]').val("").trigger('change');
        $('[name="guru_id"]').val("").trigger('change');
        $('[name="mapel_nama"]').val("");
        $('#mapelModal .modal-title').html('Tambah Mata Pelajaran');
        $('[name="ubah"]').hide();
        $('[name="tambah"]').show();
    } else {
        $('#mapelModal .modal-title').html('Edit Mata Pelajaran');
        $('[name="tambah"]').hide();
        $('[name="ubah"]').show();

        $.ajax({
            type: "POST",
            data: {
                id: x
            },
            url: '<?=base_url();?>process/view_mapel.php',
            dataType: 'json',
            success: function(data) {
                $('[name="idmata_pelajaran"]').val(data.idmata_pelajaran);
                $('[name="kelas_id"]').val(data.kelas_id).trigger('change');
                $('[name="guru_id"]').val(data.guru_id).trigger('change');
                $('[name="mapel_kode"]').val(data.mapel_kode);
                $('[name="mapel_nama"]').val(data.mapel_nama);
            }
        });
    }
}
</script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mata Pelajaran</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#mapelModal"
                onclick="submit('add')">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20">NO</th>
                            <th>KODE</th>
                            <th>MATA PELAJARAN</th>
                            <th>KELAS</th>
                            <th>PENGAJAR</th>
                            <th width="50">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $n=1;
                        $query = mysqli_query($con,"SELECT * FROM mata_pelajaran x JOIN kelas x1 ON x.kelas_id=x1.idkelas JOIN guru x2 ON x.guru_id=x2.idguru ORDER BY mapel_nama ASC")or die(mysqli_error($con));
                        while($row = mysqli_fetch_array($query)):
                        ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?= $row['mapel_kode']; ?></td>
                            <td><?= $row['mapel_nama']; ?></td>
                            <td><?= $row['kelas_kode']; ?></td>
                            <td><?= $row['guru_nama']; ?></td>
                            <td>
                                <a href="#mapelModal" data-toggle="modal"
                                    onclick="submit(<?=$row['idmata_pelajaran'];?>)"
                                    class="btn btn-sm btn-circle btn-info" data-toggle="tooltip" data-placement="top"
                                    title="Ubah Data"><i class="fas fa-edit"></i></a>
                                <a href="<?=base_url();?>process/mata_pelajaran.php?act=<?=encrypt('delete');?>&id=<?=encrypt($row['idmata_pelajaran']);?>"
                                    class="btn btn-sm btn-circle btn-danger btn-hapus" data-toggle="tooltip"
                                    data-placement="top" title="Hapus Data"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal Tambah kelas -->
<div class="modal fade" id="mapelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?=base_url();?>process/mata_pelajaran.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mapel_kode">Kode Mapel <span class="text-danger">*</span></label>
                                <input type="hidden" name="idmata_pelajaran">
                                <input type="text" class="form-control" id="mapel_kode" name="mapel_kode" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="mapel_nama">Nama Mapel <span class="text-danger">*</span></label>
                                <input name="mapel_nama" id="mapel_nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kelas_id">Kelas <span class="text-danger">*</span></label>
                                <select name="kelas_id" id="kelas_id" class="form-control select2" style="width:100%;"
                                    required>
                                    <option value="">-- Pilih Kelas --</option>
                                    <?= list_kelas(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="guru_id">Pengajar <span class="text-danger">*</span></label>
                                <select name="guru_id" id="guru_id" class="form-control select2" style="width:100%;"
                                    required>
                                    <option value="">-- Pilih Guru --</option>
                                    <?= list_guru(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr class="sidebar-divider">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-times"></i>
                        Batal</button>
                    <button class="btn btn-primary float-right" type="submit" name="tambah"><i class="fas fa-save"></i>
                        Tambah</button>
                    <button class="btn btn-primary float-right" type="submit" name="ubah"><i class="fas fa-save"></i>
                        Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>