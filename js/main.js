let metronome_playback = false;
let metronome_interval = null;
let bpm = 10;

let test_me = true;
let answer_string = null;
let answer_note = null;
let correct = 0;
let incorrect = 0;

/** Listeners */
const setAnswer = (e) => {
    if (answer_note == null) answer_note = e.currentTarget.dataset.label;
    if (answer_string == null) answer_string = e.currentTarget.dataset.string;
}

const toggleTestMe = (e) => {
    test_me = e.currentTarget.checked;
    if (!test_me) {
        document.getElementById("test-note").innerHTML = '';
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
    }, interval);
}

const metronomeSound = () => {
    if (!metronome_playback) return;
    const metronome_sound = new Audio('sounds/metronome_fast.mp3');
    metronome_sound.play();
}

const randomNote = () => {
    const note_idx = Math.floor(Math.random() * notes.length);
    return notes[note_idx];
}

const deactivateNotes = () => {
    document.querySelectorAll('.note')
        .forEach(note => note.classList.remove("active", "inactive"));
}

const activateNotes = (note, result) => {
    const effect = result ? 'active' : 'inactive';
    for (let i = 1; i < strings.length + 1; i++) {
        const string_enabled = document.getElementById(`string-${i}`).checked;
        if (string_enabled) {
            document.querySelectorAll(`.note[data-label="${note}"][data-string="${i}"]`)
                .forEach(note => note.classList.add(effect));
        }
    }
}

const testMe = () => {
    if (!test_me) return;
    answer_note = null;
    answer_string = null;
    deactivateNotes();
    const random_note = randomNote();
    const delay = 0.8;
    const interval = Math.floor(6E4 / bpm * delay);

    document.getElementById("test-note").innerHTML = random_note;
    setTimeout(() => {
        const result = random_note == answer_note;
        if (result) {
            correct++;
        } else {
            incorrect++;
        }
        activateNotes(random_note, result);
    }, interval);
}



/** Let it rip */
startMetronome();
