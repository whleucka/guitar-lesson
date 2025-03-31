<ul class="list-group">
    <li class="list-group-item">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" onChange="toggleMetronomePlayback(event)" id="metronome">
            <label class="form-check-label" for="toggle-metronome">Metronome sound</label>
        </div>
        <div class="input-group mt-2">
            <span class="input-group-text">BPM</span>
            <input type="number" onChange="setBPM(event)" id="bpm" value="10" min="1" max="120" class="form-control">
        </div>
    </li>
</ul>
