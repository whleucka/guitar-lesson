<?php include __DIR__ . '/inc/process_request.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guitar</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <section class="p-2">
        <h1>Guitar Lesson</h1>
        <section id="fretboard" class="mt-3 d-flex justify-content-around align-items-center">
            <?php foreach ($strings as $i => $string): ?>
                <hr class="strings string-<?= $i + 1 ?>">
            <?php endforeach ?>
            <?php for ($i = 0; $i < $fret_count; $i++): ?>
                <div class="fret <?= ($i == 0 ? 'flex-grow-1' : '') ?> d-flex flex-column justify-content-center align-items-center">
                    <?php if (in_array($i, [3, 5, 7, 9, 12])): ?>
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
                        <button class="btn note" data-string="<?=$j+1?>" data-label="<?= $notes[$idx] ?>"><?= $notes[$idx] ?></button>
                    <?php endforeach ?>
                </div>
            <?php endfor ?>
        </section>
        <section id="settings" class="mt-5">
            <h3>Settings</h3>
            <div class="d-flex">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" onChange="toggleNoteLabels(event)" id="show-note-labels" checked="">
                            <label class="form-check-label" for="show-note-labels">Show note labels</label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" onChange="toggleMetronome(event)" id="metronome">
                            <label class="form-check-label" for="toggle-metronome">Metronome</label>
                        </div>
                        <div class="input-group mt-2">
                            <span class="input-group-text">BPM</span>
                            <input type="number" onInput="setBPM(event)" id="bpm" value="10" min="1" max="60" class="form-control">
                        </div>
                    </li>
                    <li id="random-notes" class="list-group-item" style="display: none;">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="toggle-random-note" checked="">
                            <label class="form-check-label" for="toggle-random-note">Random note</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="toggle-random-string">
                            <label class="form-check-label" for="toggle-random-note">Random string</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="toggle-alternate-strings">
                            <label class="form-check-label" for="toggle-alternate-strings">Ascend & decend strings</label>
                        </div>
                        <div>
                            <span id="random-note"></span>
                        </div>
                        <div class="mt-2">Strings</div>
                        <?php foreach ($strings as $i => $string): ?>
                            <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="checkbox" id="string-<?=6 - $i?>" checked="">
                                <label class="form-check-label" for="string-<?=6 - $i?>"><?=$string?></label>
                            </div>
                        <?php endforeach ?>
                    </li>
                </ul>
            </div>
        </section>
    </section>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
