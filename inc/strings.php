<ul class="list-group">
    <li class="list-group-item">
        <p class="fw-bold"><u>Strings enabled</u></p>
        <div class="d-flex flex-column">
            <?php foreach ($strings as $i => $string): ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="string-<?=$i+1?>" checked="">
                    <label class="form-check-label" for="note-<?=$i?>"><?=$string?></label>
                </div>
            <?php endforeach ?>
        </div>
    </li>
</ul>
