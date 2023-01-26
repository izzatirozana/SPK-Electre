<table class="table table-stripped table-bordered table-hover text-dark">
    <tbody>
        <tr>
            <td colspan="<?= $baris; ?>"></td>
            <td>Jumlah</td>
        </tr>
        <?php for ($i = 1; $i <= $baris; $i++) : ?>
            <tr>
                <?php for ($k = 1; $k <= $baris + 1; $k++) : ?>
                    <?php
                    if ($k <= $baris)
                        $e1["$i$k"] = $f["$i$k"] * $g["$i$k"];
                    ?>
                    <?php if ($i == $k) : ?>
                        <td></td>
                    <?php elseif ($k == $baris + 1) : ?>
                        <?php for ($r = 1; $r <= $baris; $r++) : ?>
                            <?php $rata2 = $rata2 + $e1["$i$r"] ?>
                        <?php endfor; ?>
                        <?php $rata[$i - 1] = $rata2  ?>
                        <?php $rata2 = 0 ?>
                        <td>
                            <?= $rata[$i - 1] ?>
                        </td>
                    <?php else : ?>
                        <td><?= number_format($e1["$i$k"], $decimal) ?></td>
                    <?php endif; ?>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>