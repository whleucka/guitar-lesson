<section>
    <form method="POST" class="d-flex align-items-center">
        <div class="d-flex align-items-center">
            <label>Frets</label>
            <select id="fret-count" class="ms-2 form-control" name="fret_count" onChange="this.form.submit()">
                <?php foreach ($fret_counts as $c): ?>
                    <option value="<?=$c?>" <?=($fret_count === $c ? 'selected' : '')?>><?=$c-1?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="d-flex align-items-center ms-2">
            <label>Tuning</label>
            <select id="tuning" class="ms-2 form-control" name="tuning" onChange="this.form.submit()">
                <?php foreach ($tunings as $t): ?>
                    <option value="<?=$t?>" <?=($tuning === $t ? 'selected' : '')?>><?=$t?></option>
                <?php endforeach ?>
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
            <?php if (in_array($i, $fret_markings)): ?>
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
