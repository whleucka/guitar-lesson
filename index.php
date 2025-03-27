<?php include __DIR__ . '/inc/process_request.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Guitar</title>
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
    <section class="p-2">
        <h1>Guitar Lesson</h1>
        <section id="fretboard" class="mt-3 d-flex justify-content-around align-items-center">
            <?php foreach ($strings as $i => $string): ?>
            <hr class="string string-<?=$i+1?>">
            <?php endforeach ?>
            <?php for($i = 0; $i < $fret_count; $i++): ?>
            <div class="d-flex flex-column">
                <div class="fret d-flex flex-column justify-content-center align-items-center">
                    <?php if (in_array($i, [3,5,7,9,12])): ?>
                        <div class="d-flex flex-column align-items-center marker">
                            <div class="circle">&nbsp;</div>
                            <?php if ($i === 12): ?>
                                <div class="circle mt-5">&nbsp;</div>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                    <?php foreach ($strings as $j => $string): 
                        $note_index = array_search($string, $notes); 
                        $idx = ($note_index + $i) % count($notes); ?>
                        <button class="btn note"><?=$notes[$idx]?></button>
                    <?php endforeach ?>
                </div>
                <div class="d-flex justify-content-center">
                    <strong><?=$i?></strong>
                </div>
            </div>
            <?php endfor ?>
        </section>
    </section>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
