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
                            <h5 class="card-title mb-0">Change Password</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('home/password') ?>" method="post">
                            <input type="hidden" name="id_user" value="1">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Password Lama</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" name="password_lama" placeholder="Masukan Password Lama" autocomplete="off">
                                    <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Password Baru</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" name="password_baru1" placeholder="Masukan Password Baru" autocomplete="off">
                                    <?= form_error('password_baru1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Ulang Password</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" name="password_baru2" placeholder="Konfirmasi Password Baru" autocomplete="off">
                                    <?= form_error('password_baru2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>