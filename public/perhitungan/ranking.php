<?php $ranking = $rata ?>
<br>
<?php if ($options == 1) : ?>
    <?php rsort($ranking) ?>
<?php else : ?>
    <?php sort($ranking) ?>
<?php endif ?>
<table class="table table-stripped table-bordered table-hover text-dark">
    <tbody>
        <tr>
            <th>RANKING</th>
            <th>NAMA</th>
            <th>NILAI</th>
        </tr>
        <?php for ($i = 0; $i < $total_rank; $i++) : ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td>
                    <?php for ($k = 0; $k < $baris; $k++) : ?>
                        <?php if ($rata[$k] == $ranking[$i]) {
                            echo $name[$k];
                        } ?>
                    <?php endfor; ?>
                </td>
                <td><?= $ranking[$i] ?></td>
            </tr>
        <?php endfor ?>
    </tbody>
</table>