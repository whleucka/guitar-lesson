<section id="tabs" class="mt-2">
    <nav class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-link active" id="nav-test-tab" data-bs-toggle="tab" href="#nav-test" role="tab" aria-controls="nav-test" aria-selected="true">Test</a>
        <a class="nav-link" id="nav-metronome-tab" data-bs-toggle="tab" href="#nav-metronome" role="tab" aria-controls="nav-metronome" aria-selected="false">Metronome</a>
        <a class="nav-link" id="nav-strings-tab" data-bs-toggle="tab" href="#nav-strings" role="tab" aria-controls="nav-profile" aria-selected="false">Strings</a>
        <a class="nav-link" id="nav-notes-tab" data-bs-toggle="tab" href="#nav-notes" role="tab" aria-controls="nav-profile" aria-selected="false">Notes</a>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-test" role="tabpanel" aria-labelledby="nav-test-tab"><?php include "test.php" ?></div>
        <div class="tab-pane fade" id="nav-metronome" role="tabpanel" aria-labelledby="nav-metronome-tab"><?php include "metronome.php" ?></div>
        <div class="tab-pane fade" id="nav-strings" role="tabpanel" aria-labelledby="nav-strings-tab"><?php include "strings.php" ?></div>
        <div class="tab-pane fade" id="nav-notes" role="tabpanel" aria-labelledby="nav-notes-tab"><?php include "notes.php" ?></div>
    </div>
</section>
