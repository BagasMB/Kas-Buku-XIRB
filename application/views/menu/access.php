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
                            <h5 class="card-title mb-0">Data Access Menu</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                <i class="align-middle me-2" data-feather="user-plus"></i>
                                Tambah
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <table id="myTable" class="table table-hover table-responsive my-0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Level Id</th>
                                    <th>Menu Id</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($access as $a) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $a['level_id']; ?></td>
                                        <td><?= $a['menu_id']; ?></td>
                                        <td>
                                            <button data-bs-toggle="modal" data-bs-target="#EditAccessMenu<?= $a['id']; ?>" class="btn btn-success">Edit</button>
                                            <a href="<?= base_url('menu/hapusAccessMenu/' . $a['id']); ?>" onclick="return confirm('Yakin nih?')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class=" modal fade" id="EditAccessMenu<?= $a['id']; ?>" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="modalTambahLabel">Form Edit Menu Access</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="<?= base_url('menu/editAccessMenu'); ?>" method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?= $a['id']; ?>">
                                                        <div class="row mb-3">
                                                            <label class="col-md-2 col-form-label" for="basic-default-email">Level</label>
                                                            <div class="col-md">
                                                                <select class="form-select" name="level_id">
                                                                    <option <?php if ($a['level_id'] == '2') {
                                                                                echo "selected";
                                                                            } ?> value="2">User</option>
                                                                    <option <?php if ($a['level_id'] == '1') {
                                                                                echo "selected";
                                                                            } ?> value="1">Admin</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-sm-2 col-form-label">Menu Id</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" placeholder="menu Id" name="menu_id" value="<?= $a['menu_id']; ?>" autocomplete="off">
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
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu/tambahAccessMenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-md-2 col-form-label" for="basic-default-email">Level</label>
                        <div class="col-md">
                            <select class="form-select" name="level_id">
                                <option value="2">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Menu Id</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="menu Id" name="menu_id" autocomplete="off">
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