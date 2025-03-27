const bpm = document.querySelector("#bpm");
const metronome = document.querySelector("#metronome");
const metronome_sound = new Audio('sounds/metronome.mp3');
let metronome_interval = null;

const toggleNoteLabels = (event) => {
    const checkbox = event.currentTarget;
    if (checkbox.checked) {
        showNoteLabels();
    } else {
        hideNoteLabels();
    }
}

const showNoteLabels = () => {
    document.querySelectorAll(".note").forEach((btn) => {
        btn.innerHTML = btn.dataset.label;
    });
}

const hideNoteLabels = () => {
    document.querySelectorAll(".note").forEach((btn) => {
        btn.innerHTML = '&nbsp;&nbsp;&nbsp;';
    });
}

const setBPM = () => {
    console.log("changed");
    if (metronome.checked) {
        stopMetronome();
        startMetronome();
    }
}

const startMetronome = () => {
    const interval = 6E4 / bpm.value;
    metronome_interval = setInterval(() => {
        metronome_sound.play();
    }, interval);
}

const stopMetronome = () => {
    clearInterval(metronome_interval);
    metronome_interval = null;
}

const toggleMetronome = (event) => {
    const checkbox = event.currentTarget;
    if (checkbox.checked) {
        startMetronome();
    } else {
        stopMetronome();
    }
}
