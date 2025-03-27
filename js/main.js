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
        document.querySelectorAll('.note')
            .forEach(note => note.classList.remove("active"));
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

    if (note === current_random) {
        return showRandomNote();
    }

    random_note.innerHTML = note;
    random_note.style.display = 'block';

    for (let i = 1; i < 7; i++) {
        const string_enabled = document.getElementById(`string-${i}`).checked;
        if (string_enabled) {
            document.querySelectorAll(`.note[data-label="${note}"][data-string="${i}"]`)
                .forEach(note => note.classList.add("active"));
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

const toggleMetronome = (event) => {
    const checkbox = event.currentTarget;
    if (checkbox.checked) {
        startMetronome();
        document.getElementById("random-notes").style.display = "block";
    } else {
        stopMetronome();
        document.getElementById("random-notes").style.display = "none";
    }
}
