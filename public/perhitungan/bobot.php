<div>
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
        <?php for ($i = 1; $i <= $baris; $i++) : ?>
            <tr>
                <td>
                    <?= $name[$i - 1] ?>
                </td>
                <?php for ($k = 1; $k <= $jum_kriteria; $k++) : ?>
                    <?php
                    $bobot["$i$k"] = $normalisasi["$i$k"] * $w["1$k"];
                    ?>
                    <td>
                        <?= number_format($bobot["$i$k"], $decimal) ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</div>