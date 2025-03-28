const bpm = document.querySelector("#bpm");
const metronome = document.querySelector("#metronome");
const random_note = document.querySelector("#random-note");
const metronome_sound = new Audio('sounds/metronome.mp3');
let metronome_interval = null;
const strings = [
    'E',
    'B',
    'G',
    'D',
    'A',
    'E',
];
const notes = [
    'A',
    'A♯/B♭',
    'B',
    'C',
    'C♯/D♭',
    'D',
    'D♯/E♭',
    'E',
    'F',
    'F♯/G♭',
    'G',
    'G♯/A♭',
];

let string_index = 6;
let string_direction = 'down';

const toggleNoteLabels = (event) => {
    const checkbox = event.currentTarget;
    if (checkbox.checked) {
        showNoteLabels();
    } else {
        hideNoteLabels();
    }
}

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

const setBPM = () => {
    if (metronome.checked) {
        stopMetronome();
        startMetronome();
    }
}

const startMetronome = () => {
    if (isNaN(bpm.value) || bpm.value <= 0) {
        stopMetronome();
        console.error("Invalid BPM");
        return;
    }

    const interval = Math.floor(6E4 / bpm.value);
    metronome_interval = setInterval(() => {
        deactivateNotes();
        metronome_sound.play();
        const show_random = document.querySelector("#toggle-random-note").checked;
        if (show_random) {
            showRandomNote();
        } else {
            hideRandomNote();
        }
    }, interval);
}

const showRandomNote = () => {
    const current_random = random_note.innerHTML;
    const random_index = Math.floor(Math.random() * 1000);
    const note_index = random_index % notes.length;
    const note = notes[note_index];

    if (note == current_random) {
        return showRandomNote();
    }

    random_note.innerHTML = note;
    random_note.style.display = 'block';

    const random_string = document.querySelector("#toggle-random-string").checked;
    if (random_string) {
        randomizeStrings();
    }

    const alternate_strings = document.querySelector("#toggle-alternate-strings").checked;
    if (alternate_strings) {
        alternateStrings();
    }
    const delay = 0.7;
    const interval = Math.floor(6E4 / bpm.value * delay);
    setTimeout(_ => {
        activateNotes(note);
    }, interval);
}

const alternateStrings = () => {
    for (let i = 1; i < 7; i++) {
        if (i == string_index) {
            document.getElementById(`string-${i}`).checked = true;
        } else {
            document.getElementById(`string-${i}`).checked = false;
        }
    }

    if (string_index >= 6) string_direction = 'down';
    if (string_index <= 1) string_direction = 'up';

    if (string_direction == 'up') {
        string_index++;
    } else {
        string_index--;
    }
}

const randomizeStrings = () => {
    const random_string = Math.floor(Math.random() * 6) + 1;
    for (let i = 1; i < 7; i++) {
        if (i == random_string) {
            document.getElementById(`string-${i}`).checked = true;
        } else {
            document.getElementById(`string-${i}`).checked = false;
        }
    }
}

const hideRandomNote = () => {
    random_note.style.display = 'none';
}

const stopMetronome = () => {
    clearInterval(metronome_interval);
    metronome_interval = null;
}

const hideRandomNotes = () => {
    document.getElementById("random-notes").style.display = "none";
}

const showRandomNotes = () => {
    document.getElementById("random-notes").style.display = "block";
}

const deactivateNotes = () => {
    document.querySelectorAll('.note')
        .forEach(note => note.classList.remove("active"));
}

const activateNotes = (note) => {
    for (let i = 1; i < 7; i++) {
        const string_enabled = document.getElementById(`string-${i}`).checked;
        if (string_enabled) {
            document.querySelectorAll(`.note[data-label="${note}"][data-string="${i}"]`)
                .forEach(note => note.classList.add("active"));
        }
    }
}

const toggleMetronome = (event) => {
    const checkbox = event.currentTarget;
    if (checkbox.checked) {
        startMetronome();
        showRandomNotes();
    } else {
        stopMetronome();
        hideRandomNote();
        hideRandomNotes();
        deactivateNotes();
    }
}
