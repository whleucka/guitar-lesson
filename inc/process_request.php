<?php

// +1 to account for the open strings
$fret_counts = [
    13, 25
];
$fret_markings = [3, 5, 7, 9, 12, 15, 17, 19, 21];
$tunings = [
    "E Standard",
    "Drop D",
    "Drop C",
    "Drop B",
    "Drop A",
];
$fret_count = 13; // default
$tuning = "Standard"; // default

// default
$strings = [
    'E',
    'B',
    'G',
    'D',
    'A',
    'E',
];

// da notes
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
    "C Major (open)" => [
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
    ],
    "C Major (1 octive)" => [
        ["C", 5],
        ["D", 5],
        ["E", 4],
        ["F", 4],
        ["G", 4],
        ["A", 3],
        ["B", 3],
        ["C", 3],
        ["B", 3],
        ["A", 3],
        ["G", 4],
        ["F", 4],
        ["E", 4],
        ["D", 5],
        ["C", 5],
    ],
    "C Major (2 octive)" => [
        ["C", 6],
        ["D", 6],
        ["E", 5],
        ["F", 5],
        ["G", 5],
        ["A", 4],
        ["B", 4],
        ["C", 4],
        ["D", 3],
        ["E", 3],
        ["F", 3],
        ["G", 2],
        ["A", 2],
        ["B", 1],
        ["C", 1],
        ["B", 1],
        ["A", 2],
        ["G", 2],
        ["F", 3],
        ["E", 3],
        ["D", 3],
        ["C", 4],
        ["B", 4],
        ["A", 4],
        ["G", 5],
        ["F", 5],
        ["E", 5],
        ["D", 6],
        ["C", 6],
    ],
];

if (isset($_POST['fret_count'])) {
    if (!in_array($_POST['fret_count'], $fret_counts)) exit;
    $fret_count = intval($_POST['fret_count']);
}

if (isset($_POST['tuning'])) {
    if (!in_array($_POST['tuning'], $tunings)) exit;
    $tuning = $_POST['tuning'];
    $strings = match($_POST['tuning']) {
        'E Standard' => [
            'E',
            'B',
            'G',
            'D',
            'A',
            'E',
        ],
        'Drop D' => [
            'E',
            'B',
            'G',
            'D',
            'A',
            'D',
        ],
        'Drop C' => [
            'C', 
            'G', 
            'C',
            'F',
            'A',
            'D',
        ],
        'Drop B' => [
            'C♯/D♭',
            'G♯/A♭',
            'E',
            'B',
            'F♯/G♭',
            'B',
        ],
        'Drop A' => [
            'B',
            'F♯/G♭',
            'D',
            'A',
            'E',
            'A',
        ],
    };
}
