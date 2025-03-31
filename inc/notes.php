<ul class="list-group">
    <li class="list-group-item">
        <p><u>Notes enabled</u></p>
        <div class="d-flex flex-column">
            <?php foreach ($notes as $i => $note): ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="note-<?=$i?>" checked="">
                    <label class="form-check-label" for="note-<?=$i?>"><?=$note?></label>
                </div>
            <?php endforeach ?>
        </div>
    </li>
    <li class="list-group-item">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" onChange="toggleNoteLabels(event)" id="note-labels" checked="">
            <label class="form-check-label" for="show-note-labels">Show note labels</label>
        </div>
    </li>
</ul>
