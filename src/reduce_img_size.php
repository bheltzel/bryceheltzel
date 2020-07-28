<?php
/**
 * Created by PhpStorm.
 * User: bryceheltzel_
 * Date: 3/5/19
 * Time: 9:40 PM
 */

function compress($source, $destination, $quality) {

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);

    return $destination;
}

$image_list = array();
$files = glob('./i/*');

foreach ($files as $file) {
    $image_list[filemtime($file)] = $file;
}
//ksort($image_list);
//$image_list = array_reverse($image_list, TRUE);

$i = 100;
foreach ($image_list as $image) {
//    if ($i < 15) {
        $source_img = $image;
        $destination_img = str_replace('i/', 'i_low/', $image);
        $d = compress($source_img, $destination_img, 20);
        $i++;
//    } else {
//        break;
//    }
}

