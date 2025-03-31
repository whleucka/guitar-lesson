<section>
    <form method="POST">
        <div class="mt-3 d-flex align-items-center">
            <label>Frets</label>
            <select id="fret-count" class="ms-2 form-control" name="fret_count" onChange="this.form.submit()">
            <option value="13" <?=($fret_count === 13 ? 'selected' : '')?>>12</option>
                <option value="25" <?=($fret_count === 25 ? 'selected' : '')?>>24</option>
            </select>
        </div>
    </form>
</section>
<section id="fretboard" class="mt-3 d-flex justify-content-around align-items-center">
    <?php foreach ($strings as $i => $string): ?>
        <hr class="strings string-<?= $i + 1 ?>">
    <?php endforeach ?>
    <?php for ($i = 0; $i < $fret_count; $i++): ?>
        <div class="fret <?= ($i == 0 ? 'first-fret' : '') ?> d-flex flex-column justify-content-center align-items-center">
            <?php if (in_array($i, [3, 5, 7, 9, 12, 15, 17, 19, 21])): ?>
                <div class="d-flex flex-column align-items-center marker">
                    <div class="circle">&nbsp;</div>
                    <?php if ($i === 12): ?>
                        <div class="circle mt-5">&nbsp;</div>
                    <?php endif ?>
                </div>
            <?php endif ?>
            <?php foreach ($strings as $j => $string):
                $note_index = array_search($string, $notes);
                $idx = ($note_index + $i) % count($notes); ?>
                <button onClick="setAnswer(event)" class="btn note" data-string="<?=$j+1?>" data-label="<?= $notes[$idx] ?>"><?= $notes[$idx] ?></button>
            <?php endforeach ?>
        </div>
    <?php endfor ?>
</section>
