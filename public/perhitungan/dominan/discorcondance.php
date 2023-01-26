<?php
for ($i = 1; $i <= $baris; $i++) {
    for ($k = 1; $k <= $baris; $k++) {
        if ($i != $k) {
            $totDes = $totDes + $descordance["$i$k"];
        }
    }
}
$d = $totDes / ($baris * ($baris - 1));
echo "Nilai Threshold (D) = " . number_format($d, $decimal);
?>
<table class="table table-stripped table-bordered table-hover text-dark">
    <tbody>
        <?php for ($i = 1; $i <= $baris; $i++) : ?>
            <tr>
                <?php for ($k = 1; $k <= $baris; $k++) : ?>
                    <?php
                    for ($cek = 1; $cek <= $baris; $cek++) {
                        if ($descordance["$i$cek"] >= $d) {
                            $g["$i$cek"] = 1;
                        } else {
                            $g["$i$cek"] = 0;
                        }
                    }
                    ?>
                    <?php if ($k == $i) : ?>
                        <td>

                        </td>
                    <?php else : ?>
                        <td>
                            <?= $g["$i$k"]; ?>
                        </td>
                    <?php endif; ?>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>