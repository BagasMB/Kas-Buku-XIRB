<main class="content">
    <div class="container-fluid p-0">

        <div class="col-md-5" id="ngilang">
            <?= $this->session->flashdata('pesan'); ?>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title mb-0">Data Pemasukan</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                <i class="align-middle me-2" data-feather="user-plus"></i>
                                Tambah
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">

                        <table id="myTable" class="table table-hover table-responsive my-0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($masuk as $ser) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $ser['tanggal_transaksi']; ?></td>
                                        <td><?= $ser['nama']; ?></td>
                                        <td>Rp<?= number_format($ser['nominal']); ?></td>
                                        <td><?= $ser['keterangan']; ?></td>
                                        <td align="center">
                                            <?php if ($user['level'] == 1) : ?>
                                                <a href="<?= base_url('pemasukan/hapus/' . $ser['id_transaksi']); ?>" onclick="return confirm('Yakin nih?')" class="btn btn-danger">Delete</a>
                                            <?php elseif ($ser['username'] == $user['username']) : ?>
                                                <a href="<?= base_url('pemasukan/hapus/' . $ser['id_transaksi']); ?>" onclick="return confirm('Yakin nih?')" class="btn btn-danger">Delete</a>
                                            <?php else : ?>
                                                <i class="fa fa-minus"></i>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalEdit<?= $ser['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Edit User</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="<?= base_url('user/edit'); ?>" method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id_user" value="<?= $ser['id_user']; ?>">
                                                        <div class="row mb-3">
                                                            <label class="col-3 col-form-label">Username</label>
                                                            <div class="col">
                                                                <input type="text" class="form-control" placeholder="Username" name="username" value="<?= $ser['username']; ?>" autocomplete="off" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-3 col-form-label">Password</label>
                                                            <div class="col">
                                                                <input type="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" name="password" value="<?= $ser['password']; ?>" autocomplete="off" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-3 col-form-label">Nama</label>
                                                            <div class="col">
                                                                <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?= $ser['nama']; ?>" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-3 col-form-label">Level</label>
                                                            <div class="col">
                                                                <select class="form-select" name="level">
                                                                    <option <?php if ($ser['level'] == '2') {
                                                                                echo "selected";
                                                                            } ?> value="2">User</option>
                                                                    <option <?php if ($ser['level'] == '1') {
                                                                                echo "selected";
                                                                            } ?> value="1">Admin</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Modal -->
<div class=" modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTambahLabel">Form Input Pemasukan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pemasukan/tambahPemasukan'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="username" value="<?= $user['username']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label>Nominal</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp.</span>
                            <input type="text" class="form-control" name="nominal" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->