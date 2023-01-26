<table class="table table-stripped table-bordered table-hover text-dark">
    <tbody>
        <?php for ($i = 1; $i <= $baris; $i++) : ?>
            <tr>
                <?php for ($k = 1; $k <= $baris; $k++) : ?>
                    <?php
                    for ($cek = 1; $cek <= $kolom; $cek++) {
                        if ($bobot["$i$cek"] >= $bobot["$k$cek"]) {
                            $jumCon = $jumCon + $w["1$cek"];
                        }
                    }
                    $concordance["$i$k"] = $jumCon;
                    $jumCon = 0;
                    ?>
                    <?php if ($k == $i) : ?>
                        <td>

                        </td>
                    <?php else : ?>
                        <td>
                            <?= number_format($concordance["$i$k"], $decimal) ?>
                        </td>
                    <?php endif; ?>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>