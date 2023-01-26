<div>
    <div class="pt-4 mb-2">
        <h4>
            <center>DATA SAAT INI</center>
        </h4>
    </div>

    <table class="table table-stripped table-bordered table-hover text-dark">
        <tr>
            <th scope="col">NAMA</th>
            <th scope="col">Tujuan (K1)</th>
            <th scope="col">Jumlah Pinjaman (K2)</th>
            <th scope="col">Gaji (K3)</th>
            <th scope="col">Simpanan (K4)</th>
        </tr>
        <?php for ($i = 1; $i <= $baris + 1; $i++) : ?>
            <tr>
                <?php for ($k = 0; $k <= 4; $k++) : ?>
                    <?php if ($i == $baris + 1 && $k == 0) : ?>
                        <td>
                            BOBOT
                        </td>
                    <?php elseif ($k == 0) : ?>
                        <td>
                            <?= $name[$i - 1]; ?>
                        </td>
                    <?php elseif ($i == $baris + 1) : ?>
                        <td>
                            <?= $w["1$k"] ?>
                        </td>
                    <?php else : ?>
                        <td>
                            <?= $cel["$i$k"] ?>
</div>
</td>
<?php endif; ?>
<?php endfor; ?>
</tr>
<?php endfor; ?>
</table>
</div>

<div>