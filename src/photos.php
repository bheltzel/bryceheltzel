<?php
require_once("header.php");
?>
<body>
<div role="main" class="container center">
    <?php

    $image_list = array();
    $files = glob('./i/*');
    foreach ($files as $file) {
        $image_list[filemtime($file)] = $file;
    }
    ksort($image_list);
    $image_list = array_reverse($image_list, TRUE);

    foreach ($image_list as $image) {
        $file_name = $image;
        $photo = '<img src="' . $file_name . '" class="img-hor">';
        $light_box = '<a href="'.$file_name.'" data-featherlight="image" data-featherlight-close-on-click="anywhere">'.$photo.'</a>';
        echo($light_box);
        echo('<br><br>');
    }
    ?>
</div>
<script>
    $('.container').infiniteScroll({
        // options
        path: '.pagination__next',
        append: '.img-hor',
        history: false
    });
</script>
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
<script type="text/javascript" src="js/jq.js"></script>
<script src="//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
</body>