<?php

$fret_count = 13;

if (isset($_POST['fret_count'])) {
    $fret_count = intval($_POST['fret_count']);
}
//$fret_count = 25;

$strings = [
    'E',
    'B',
    'G',
    'D',
    'A',
    'E',
];

$notes = [
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
