<table class="table table-stripped table-bordered table-hover text-dark">
    <thead>
        <tr>
            <th scope="col">Nama</th>
                <th scope="col">Tujuan (K1)</th>
                <th scope="col">Jumlah Pinjaman (K2)</th>
                <th scope="col">Gaji (K3)</th>
                <th scope="col">Simpanan (K4)</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 1; $i <= $baris; $i++) : ?>
            <tr>
                <td>
                    <?= $name[$i - 1] ?>
                </td>
                <?php for ($k = 1; $k <= $jum_kriteria; $k++) : ?>
                    <?php
                    for ($x = 1; $x <= $baris; $x++) {
                        $hasil = $hasil + pow($normal["$x$k"], 2);
                    }
                    $normalisasi["$i$k"] = $normal["$i$k"] / sqrt($hasil);
                    $hasil = 0;
                    ?>
                    <td>
                        <?= number_format($normalisasi["$i$k"], $decimal) ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>