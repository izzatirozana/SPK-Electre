<table class="table table-stripped table-bordered table-hover text-dark">
    <tbody>
        <?php for ($i = 1; $i <= $baris; $i++) : ?>
            <tr>
                <?php for ($k = 1; $k <= $baris; $k++) : ?>
                    <?php
                    for ($cek = 1; $cek <= $kolom; $cek++) {
                        if ($bobot["$i$cek"] < $bobot["$k$cek"]) {
                            $jumDis["$i$cek"] = abs($bobot["$i$cek"] - $bobot["$k$cek"]);
                        } else {
                            $jumDis["$i$cek"] = 0;
                        }
                        //Pembagi Discordance
                        $totDis["$i$cek"] = abs($bobot["$i$cek"] - $bobot["$k$cek"]);
                    }
                    $atasDes = max($jumDis);
                    $bawahDes = max($totDis);
                    $jumDis = [];
                    $totDis = [];

                    if ($bawahDes != 0) {
                        $descordance["$i$k"] = $atasDes / $bawahDes;
                    } else {
                        $descordance["$i$k"] = 0;
                    }
                    ?>
                    <?php if ($k == $i) : ?>
                        <td>

                        </td>
                    <?php else : ?>
                        <td>
                            <?= number_format($descordance["$i$k"], $decimal) ?>
                        </td>
                    <?php endif; ?>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>