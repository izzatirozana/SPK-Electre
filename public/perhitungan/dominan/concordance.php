<?php
for ($i = 1; $i <= $baris; $i++) {
    for ($k = 1; $k <= $baris; $k++) {
        if ($i != $k) {
            $totCon = $totCon + $concordance["$i$k"];
        }
    }
}
$c = $totCon / ($baris * ($baris - 1));
echo "Nilai Threshold (C) = " . number_format($c, $decimal);
?>
<table class="table table-stripped table-bordered table-hover text-dark">
    <tbody>
        <?php for ($i = 1; $i <= $baris; $i++) : ?>
            <tr>
                <?php for ($k = 1; $k <= $baris; $k++) : ?>
                    <?php
                    for ($cek = 1; $cek <= $baris; $cek++) {
                        if ($concordance["$i$cek"] >= $c) {
                            $f["$i$cek"] = 1;
                        } else {
                            $f["$i$cek"] = 0;
                        }
                    }
                    ?>
                    <?php if ($k == $i) : ?>
                        <td>

                        </td>
                    <?php else : ?>
                        <td>
                            <?= $f["$i$k"]; ?>
                        </td>
                    <?php endif; ?>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>