<ul class="list-group">
    <li class="list-group-item">
        <div class="d-flex align-items-center">
            <label>Play</label>
            <select id="scale-select" onChange="toggleScale(event)" class="form-control ms-2">
                <option value="off" selected>Off</option>
                <?php foreach ($scales as $scale => $data): ?>
                    <option value="<?=$scale?>"><?=$scale?></option>
                <?php endforeach ?>
            </select>
        </div>
    </li>
</ul>
