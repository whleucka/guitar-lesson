let metronome_playback = false;
let metronome_interval = null;
let bpm = 10;

let test_timeout = null;
let test_me = false;
let last_note = null;
let answer_string = null;
let answer_note = null;
let correct = 0;
let incorrect = 0;

let scale = null;
let scale_index = 0;

/** Listeners */
const toggleScale = (e) => {
    const index = e.currentTarget.value;
    document.getElementById("test-me").checked = false;
    if (index != 'off') {
        scale = scales[index];
    } else {
        scale = null;
    }
}

const setAnswer = (e) => {
    if (answer_note == null) answer_note = e.currentTarget.dataset.label;
    if (answer_string == null) answer_string = e.currentTarget.dataset.string;
}

const toggleTestMe = (e) => {
    test_me = e.currentTarget.checked;
    if (test_me) {
        startMetronome();
    } else {
        clearTimeout(test_timeout);
        clearHighlightNotes();
        document.getElementById("test-note").innerHTML = '';
        document.getElementById("grade").innerHTML = '';
        correct = incorrect = 0;
    }
}

const toggleNoteLabels = (e) => {
    const checkbox = e.currentTarget;
    if (checkbox.checked) {
        showNoteLabels();
    } else {
        hideNoteLabels();
    }
}

const toggleMetronomePlayback = (e) => {
    metronome_playback = e.currentTarget.checked;
}

const setBPM = (e) => {
    const value = e.currentTarget.value;
    if (isNaN(value) || value <= 0) {
        console.error("Invalid BPM");
        return;
    }
    bpm = value;
    startMetronome();
}

/** Functions **/
const showNoteLabels = () => {
    document.querySelectorAll(".note")
        .forEach((btn) => {
            btn.innerHTML = btn.dataset.label;
        });
}

const hideNoteLabels = () => {
    document.querySelectorAll(".note")
        .forEach((btn) => {
            btn.innerHTML = '&nbsp;&nbsp;&nbsp;';
        });
}

const startMetronome = () => {
    const interval = Math.floor(6E4 / bpm);
    clearInterval(metronome_interval);
    metronome_interval = setInterval(() => {
        metronomeSound();
        testMe();
        playScale();
    }, interval);
}

const metronomeSound = () => {
    if (!metronome_playback) return;
    const metronome_sound = new Audio('sounds/metronome_fast.mp3');
    metronome_sound.play();
}

const playScale = () => {
}

const randomNote = () => {
    const selected_notes = notes.filter((note,i) => document.getElementById(`note-${i}`).checked);
    const note_idx = Math.floor(Math.random() * selected_notes.length);
    const new_note = selected_notes[note_idx]
    if (new_note != last_note) {
        last_note = new_note;
        return new_note;
    }
    return randomNote();
}

const clearHighlightNotes = () => {
    document.querySelectorAll('.note')
        .forEach(note => note.classList.remove("active", "inactive"));
}

const hightlightNoteStrings = (note, result) => {
    const classname = result ? 'active' : 'inactive';
    for (let i = 1; i < strings.length + 1; i++) {
        const string_enabled = document.getElementById(`string-${i}`).checked;
        if (string_enabled) {
            highlightNoteString(note, i, classname);
        }
    }
}

const highlightNoteString = (note, string, classname) => {
    document.querySelectorAll(`.note[data-label="${note}"][data-string="${i}"]`)
        .forEach(note => note.classList.add(classname));
}

const testMe = () => {
    if (!test_me) return;
    answer_note = null;
    answer_string = null;
    clearHighlightNotes();
    const random_note = randomNote();
    const delay = 0.8;
    const interval = Math.floor(6E4 / bpm * delay);

    document.getElementById("test-note").innerHTML = random_note;
    test_timeout = setTimeout(() => {
        const result = random_note == answer_note;
        if (result) {
            correct++;
        } else {
            incorrect++;
        }
        const answered = correct + incorrect;
        const pct = (correct / answered) * 100;
        document.getElementById("grade").innerHTML = `Your score: ${correct} / ${answered} (${pct.toFixed(1)}%)`;
        hightlightNoteStrings(random_note, result);
    }, interval);
}



/** Let it rip */
startMetronome();
