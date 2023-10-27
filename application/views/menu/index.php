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
                            <h5 class="card-title mb-0">Data Menu</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                <i class="align-middle me-2" data-feather="user-plus"></i>
                                Tambah
                            </button>
                        </div>
                    </div>
                    <div class="card-body  table-responsive">

                        <table id="myTable" class="table table-hover table-responsive my-0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Menu</th>
                                    <th>Url</th>
                                    <th>Icon</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($menu as $m) : ?>
                                    <tr>
                                        <td><?= $m['id']; ?></td>
                                        <td><?= $m['menu']; ?></td>
                                        <td><?= $m['url']; ?></td>
                                        <td><?= $m['icon']; ?></td>
                                        <td>
                                            <button data-bs-toggle="modal" data-bs-target="#EditMenu<?= $m['id']; ?>" class="btn btn-success">Edit</button>
                                            <a href="<?= base_url('menu/hapusMenu/' . $m['id']); ?>" onclick="return confirm('Yakin nih?')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>

                                    <div class=" modal fade" id="EditMenu<?= $m['id']; ?>" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="modalEditLabel">Form Edit Menu</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="<?= base_url('menu/editMenu'); ?>" method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?= $m['id']; ?>">
                                                        <div class="row mb-3">
                                                            <label class="col-sm-2 col-form-label">Menu</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" placeholder="Menu" name="menu" value="<?= $m['menu']; ?>" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-sm-2 col-form-label">Url</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" placeholder="Url" name="url" value="<?= $m['url']; ?>" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-sm-2 col-form-label">Icon</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" placeholder="Icon" name="icon" value="<?= $m['icon']; ?>" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-2 col-form-label" for="basic-default-email">Active</label>
                                                            <div class="col-md">
                                                                <select class="form-select" name="is_active">
                                                                    <option <?php if ($m['is_active'] == 1) {
                                                                                echo "selected";
                                                                            } ?> value="1">Aktif</option>
                                                                    <option <?php if ($m['is_active'] == 0) {
                                                                                echo "selected";
                                                                            } ?> value="0">Non Aktif</option>
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
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu/tambahMenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Menu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Menu" name="menu" autocomplete="off">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Url</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Url" name="url" autocomplete="off">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Icon" name="icon" autocomplete="off">
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