<?php

session_start();

//$end = $_POST['counter'] + 10;
$i = $_POST['counter'];

// on first load, create the image list else get it back from last run
if ($i == 0) {

    $files = glob('./i/*');
    $image_list = array();
    foreach ($files as $file) {
        $image_list[filemtime($file)] = $file;
    }

    ksort($image_list);
    $image_list = array_reverse($image_list, TRUE);
    $_SESSION['image_list'] = $image_list;
} else {
    $image_list = $_SESSION['image_list'];
    $image_list = array_slice($image_list, 10);
}

$body = '';

foreach ($image_list as $image) {
    if ($i < 10) {
        $file_name = $image;
        $photo = '<img src="' . $file_name . '" class="img-hor">';
        $light_box = '<article class="inf"><a href="'.$file_name.'" data-featherlight="image" data-featherlight-close-on-click="anywhere">'.$photo.'</a></article>';
        $body .= $light_box;
        $body .= '<br><br>';
        $i++;
    } else {
        break;
    }
}

$arr = array(
    'BODY' => $body
    ,'COUNTER' => $i
    ,'IMAGE_LIST' => $image_list
);

echo (sizeof($arr) > 0 ) ? json_encode($arr) : null;

function array_slice_assoc($array,$keys) {
    return array_intersect_key($array,array_flip($keys));
}