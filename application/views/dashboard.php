            <main class="content">
                <div class="container-fluid p-0">


                    <div class=" mb-3 d-flex align-items-center justify-content-between">
                        <h1 class="h2">Selamat Datang <?= $user['nama']; ?></h1>
                        <button data-bs-toggle="modal" data-bs-target="#ModalPrint" class="btn btn-danger"><i class="fa fa-print me-1"></i>Detail Laporan</button>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box box-solid  table-responsive">
                                        <div class="box-body">
                                            <div class="col-xs-12">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3" style="text-align: center; font-size: 18px;">TOTAL SEMUA PEMASUKAN
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center;">HARI INI</td>
                                                            <td style="text-align: center;">BULAN INI</td>
                                                            <td style="text-align: center;">TOTAL PEMASUKAN</td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            $date = date('Y-m-d');
                                                            $month = date('Y-m');
                                                            $ue =  "SELECT sum(nominal) as nominal FROM transaksi WHERE tanggal_transaksi = '$date' AND jenis_transaksi = 'Pemasukan'";
                                                            $ue2 =  "SELECT sum(nominal) as nominal FROM transaksi WHERE DATE_FORMAT(tanggal_transaksi,'%Y-%m') = '$month' AND jenis_transaksi = 'Pemasukan'";
                                                            $harilu = $this->db->query($ue)->row_array();
                                                            $bulanlu = $this->db->query($ue2)->row_array();
                                                            foreach ($tMasuk as $totalMasuk) {
                                                            ?>
                                                                <td style="text-align: center;">Rp. <?= number_format($harilu['nominal']); ?></td>
                                                                <td style="text-align: center;">Rp. <?= number_format($bulanlu['nominal']); ?></td>
                                                                <td style="text-align: center;">Rp. <?= number_format($totalMasuk); ?></td>
                                                            <?php } ?>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-xs-12">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="4" style="text-align: center; font-size: 18px;">TOTAL SEMUA PENGELUARAN
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center;">HARI INI</td>
                                                            <td style="text-align: center;">BULAN INI</td>
                                                            <td style="text-align: center;">TOTAL PENGELUARAN</td>
                                                            <td style="text-align: center;">SALDO AKHIR</td>
                                                        </tr>
                                                        <tr>
                                                            <?php
                                                            $date = date('Y-m-d');
                                                            $month = date('Y-m');
                                                            $ue =  "SELECT sum(nominal) as nominal FROM transaksi WHERE tanggal_transaksi = '$date' AND jenis_transaksi = 'Pengeluaran'";
                                                            $ue2 =  "SELECT sum(nominal) as nominal FROM transaksi WHERE DATE_FORMAT(tanggal_transaksi,'%Y-%m') = '$month' AND jenis_transaksi = 'Pengeluaran'";
                                                            $hari = $this->db->query($ue)->row_array();
                                                            $bulan = $this->db->query($ue2)->row_array();
                                                            foreach ($tKeluar as $totalKeluar) {
                                                            ?>
                                                                <td style="text-align: center;">Rp. <?= number_format($hari['nominal']); ?></td>
                                                                <td style="text-align: center;">Rp. <?= number_format($bulan['nominal']); ?></td>
                                                                <td style="text-align: center;">Rp. <?= number_format($totalKeluar); ?></td>
                                                                <td style="text-align: center; color: green;">Rp. <?= number_format($totalMasuk - $totalKeluar); ?></td>
                                                            <?php } ?>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>


            <!-- Modal -->
            <div class="modal fade" id="ModalPrint" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Laporan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('home/laporan'); ?>" method="post" target="_blank">
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label class="form-label">Tanggal Awal</label>
                                    <input type="date" class="form-control" name="tanggal1" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" name="tanggal2" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Print</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>