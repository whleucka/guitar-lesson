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

// scales are note, string #
$scales = [
    "C major (open)" => [
        ["C", 5],
        ["D", 4],
        ["E", 4],
        ["F", 4],
        ["G", 3],
        ["A", 3],
        ["B", 2],
        ["C", 2],
        ["B", 2],
        ["A", 3],
        ["G", 3],
        ["F", 4],
        ["E", 4],
        ["D", 4],
        ["C", 5],
    ]
];
