<?php

$success = 0;

$photos = '';
$files = scandir(__DIR__ . '/i');

foreach ($files as $file) {
    if ($file != '.' && $file != '..') {
        $photos .= sprintf('<a href="i/%s" data-featherlight="image" data-featherlight-close-on-click="anywhere" data-featherlight-close-icon="null"><img class="us-photo" src="i/%s" width="100%%" ></a>', $file, $file);
        // $photos .= sprintf('<img src="img/us/%s" width="100%%" height="100%%">', $file);
    }
}


$success = 1;
$error = null;

$arr = array(
    'success' => $success
    ,'error' => $error
    ,'photos' => $photos
);

echo (sizeof($arr) > 0 ) ? json_encode($arr) : null;
