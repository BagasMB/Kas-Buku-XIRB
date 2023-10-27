            <main class="content">
                <div class="container-fluid p-0">

                    <div class="col-md-5" id="ngilang">
                        <?= $this->session->flashdata('pesan'); ?>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Profile Details</h5>
                        </div>
                        <div class="card-body text-center">
                            -
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="<?= $user['nama']; ?>" class="img-thumbnail img-fluid rounded-circle mb-2" width="300" height="300">
                            </a>
                            <h4 class="card-title mb-0"><strong><?= $user['nama']; ?></strong></h4>
                            <div class="text-bold mb-2">Status <?php if ($user['level'] == 1) : ?>Admin <?php else : ?> User <?php endif; ?></div>
                            <div>
                                <button data-bs-toggle="modal" data-bs-target="#ModalProfile" class="btn btn-primary btn-sm"><i class="align-middle me-2" data-feather="edit"></i>Edit Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Modal -->
            <div class="modal fade" id="ModalProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('home/profile'); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                                <div class="form-group mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" value="<?= $user['username']; ?>" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $user['nama']; ?>" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Foto</label>
                                    <input type="file" name="image" class="form-control">
                                    <div class="form-text fst-italic">Ukuran Gambar Harus Persegi</div>
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