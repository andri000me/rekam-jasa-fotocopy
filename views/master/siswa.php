<?php hakAkses(['admin','wali_kelas']) ?>
<script>
function submit(x) {
    if (x == 'add') {
        $('[name="siswa_nisn"]').val("");
        $('[name="kelas_id"]').val("").trigger('change');
        $('[name="siswa_nis"]').val("");
        $('[name="siswa_nama"]').val("");
        $('[name="siswa_jk"]').val("");
        $('#siswaModal .modal-title').html('Tambah Siswa');
        $('[name="ubah"]').hide();
        $('[name="tambah"]').show();
    } else {
        $('#siswaModal .modal-title').html('Edit Siswa');
        $('[name="tambah"]').hide();
        $('[name="ubah"]').show();

        $.ajax({
            type: "POST",
            data: {
                id: x
            },
            url: '<?=base_url();?>process/view_siswa.php',
            dataType: 'json',
            success: function(data) {
                $('[name="idsiswa"]').val(data.idsiswa);
                $('[name="kelas_id"]').val(data.kelas_id).trigger('change');
                $('[name="siswa_nisn"]').val(data.siswa_nisn);
                $('[name="siswa_nis"]').val(data.siswa_nis);
                $('[name="siswa_nama"]').val(data.siswa_nama);
                $('[name="siswa_jk"]').val(data.siswa_jk);
            }
        });
    }
}
</script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Siswa</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#siswaModal"
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
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>NAMA LENGKAP</th>
                            <th>JK</th>
                            <th>KELAS</th>
                            <th width="50">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $n=1;
                        $query = mysqli_query($con,"SELECT * FROM siswa x JOIN kelas x1 ON x.kelas_id=x1.idkelas ORDER BY siswa_nama ASC")or die(mysqli_error($con));
                        while($row = mysqli_fetch_array($query)):
                        ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?= $row['siswa_nisn']; ?></td>
                            <td><?= $row['siswa_nis']; ?></td>
                            <td><?= $row['siswa_nama']; ?></td>
                            <td><?= $row['siswa_jk']; ?></td>
                            <td><?= $row['kelas_kode']; ?></td>
                            <td>
                                <a href="#siswaModal" data-toggle="modal" onclick="submit(<?=$row['idsiswa'];?>)"
                                    class="btn btn-sm btn-circle btn-info" data-toggle="tooltip" data-placement="top"
                                    title="Ubah Data"><i class="fas fa-edit"></i></a>
                                <a href="<?=base_url();?>process/siswa.php?act=<?=encrypt('delete');?>&id=<?=encrypt($row['idsiswa']);?>"
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
<div class="modal fade" id="siswaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?=base_url();?>process/siswa.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
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
                                <label for="siswa_nisn">NISN <span class="text-danger">*</span></label>
                                <input type="hidden" name="idsiswa">
                                <input type="text" class="form-control" id="siswa_nisn" name="siswa_nisn" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="siswa_nis">NIS <span class="text-danger">*</span></label>
                                <input name="siswa_nis" id="siswa_nis" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="siswa_nama">Nama Lengkap <span class="text-danger">*</span></label>
                                <input name="siswa_nama" id="siswa_nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="siswa_jk">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="siswa_jk" id="siswa_jk" class="form-control" required>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
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