<?php hakAkses(['admin','wali_kelas']) ?>
<script>
function aktifkanAccount(id) {
    $('#levelModal').modal('show');
    $('#levelModal [name="idguru"]').val(id);
}
</script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Guru</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#guruModal">
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
                            <th>NIP</th>
                            <th>NAMA LENGKAP</th>
                            <th width="50">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $n=1;
                        $query = mysqli_query($con,"SELECT * FROM guru ORDER BY idguru DESC")or die(mysqli_error($con));
                        while($row = mysqli_fetch_array($query)):
                        ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?= $row['guru_nip']; ?></td>
                            <td><?= $row['guru_nama']; ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-circle btn-info" data-toggle="tooltip"
                                    data-placement="top" title="Aktifkan Akun"
                                    onclick="aktifkanAccount(<?=$row['idguru'];?>)"><i class="fas fa-key"></i></a>
                                <a href="<?=base_url();?>process/guru.php?act=<?=encrypt('delete');?>&id=<?=encrypt($row['idguru']);?>"
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

<!-- Modal Tambah guru -->
<div class="modal fade" id="guruModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?=base_url();?>process/guru.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="guru_nip">NIP Guru <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="guru_nip" name="guru_nip" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="guru_nama">Nama Lengkap Guru <span class="text-danger">*</span></label>
                                <input name="guru_nama" id="guru_nama" class="form-control" required></input>
                            </div>
                        </div>
                    </div>
                    <hr class="sidebar-divider">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-times"></i>
                        Batal</button>
                    <button class="btn btn-primary float-right" type="submit" name="tambah"><i class="fas fa-save"></i>
                        Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Tambah akun guru -->
<div class="modal fade" id="levelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?=base_url();?>process/guru.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aktifkan Akun</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="level">Level <span class="text-danger">*</span></label>
                                <input type="hidden" name="idguru">
                                <select name="level" id="level" class="form-control">
                                    <option value="guru">Guru</option>
                                    <option value="wali_kelas">Wali Kelas</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr class="sidebar-divider">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-times"></i>
                        Batal</button>
                    <button class="btn btn-info float-right" type="submit" name="aktifkan-akun"><i
                            class="fas fa-key"></i>
                        Aktifkan</button>
                </div>
            </form>
        </div>
    </div>
</div>