<html>

<head></head>

<body>
    <h2 align="center">LAPORAN KEUANGAN</h2>
    <h3 align="center">KARANG TARUNA TUNAS HARAPAN</h3>
    <h3 align="center">Padangan, Jungke, Karanganyar</h3>
    <h3 align="center"><?= $judul; ?></h3>
    <table border="1" align="center" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td colspan="4" align="center">Saldo Awal Sebelum Tanggal <?= $tanggal_awal; ?></td>
                <td align="right">Rp. <?= number_format($saldo_awal); ?></td>
            </tr>
            <?php $no = 1;
            $saldo = 0;
            foreach ($filter as $ter) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= date('d-m-Y', strtotime($ter['tanggal_transaksi'])); ?></td>
                    <td><?= $ter['keterangan']; ?></td>
                    <?php if ($ter['jenis_transaksi'] == 'Pemasukan') : ?>
                        <td align="right">Rp. <?= number_format($ter['nominal']); ?></td>
                    <?php else : ?>
                        <td>-</td>
                    <?php endif; ?>

                    <?php if ($ter['jenis_transaksi'] == 'Pengeluaran') : ?>
                        <td align="right">Rp. <?= number_format($ter['nominal']); ?></td>
                    <?php else : ?>
                        <td>-</td>
                    <?php endif; ?>

                    <?php if ($ter['jenis_transaksi'] == 'Pemasukan') : ?>
                        <td align="right">Rp. <?= number_format($saldo = $saldo + $ter['nominal']); ?></td>
                    <?php else : ?>
                        <td align="right">Rp. <?= number_format($saldo = $saldo - $ter['nominal']); ?></td>
                    <?php endif; ?>
                </tr>
            <?php
            endforeach;
            ?>
            <tr>
                <td colspan="2"></td>
                <td>JUMLAH</td>
                <td align="right">Rp. <?= number_format($tMasuk['pemasukan']); ?></td>
                <td align="right">Rp. <?= number_format($tKeluar['pengeluaran']); ?></td>
                <td align="right">Rp. <?= number_format($tMasuk['pemasukan'] - $tKeluar['pengeluaran']); ?></td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td>Saldo Akhir</td>
                <td align="right">Rp. <?= number_format($pmasuk['pemasukan'] - $pkeluar['pengeluaran']); ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>