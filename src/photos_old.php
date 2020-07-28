<?php
require_once("header.php");
?>
<body>
<div role="main" class="container center" id="container">
    <?php

    $image_list = array();
    $files = glob('./i/*');

    foreach ($files as $file) {
        $image_list[filemtime($file)] = $file;
    }
    ksort($image_list);
    $image_list = array_reverse($image_list, TRUE);

    $i = 0;
    foreach ($image_list as $image) {
        if ($i < 10) {
            $file_name = $image;
            $photo = '<img src="' . $file_name . '" class="img-hor">';
            $light_box = '<article class="inf"><a href="'.$file_name.'" data-featherlight="image" data-featherlight-close-on-click="anywhere">'.$photo.'</a></article>';
            echo($light_box);
            echo('<br><br>');
            $i++;
        } else {
            break;
        }
    }
    ?>
</div>

<script>

    $(document).ready(function() {
        var a = {};
        var image_list = {};
        for(var i = 0; i <= 10; i++) {

            console.log(image_list);
            var data = {counter: i, image_list: a};

            $.post('get_photos.php', data, function(resp) {
                var j = JSON.parse(resp);
                $('#container').append(j['BODY']);
                image_list = j['IMAGE_LIST'];
            });
            console.log(a);
        }
    });

    // $(window).scroll(function() {
    //     if(Math.round($(window).scrollTop() + $(window).innerHeight()) === $(window)[0].scrollHeight) {
    //         console.log('go');
    //     }
    // });
    // $(window).scroll(function() {
    //     if($(window).scrollTop() + $(window).height() == $(document).height()) {
    //         var new_div = '<div class="new_block"></div>';
    //         // $('.main_content').append(new_div.load('/path/to/script.php'));
    //         console.log('go');
    //     }
    // });
    //
    // setTimeout(function() {
    //     var i = 0;
    //     // $(window).scroll(function() {
    //         console.log($(window).scrollTop());
    //         console.log($(document).height());
    //         if($(window).scrollTop() + 1000 >= $(document).height()) {
    //             var data = {counter: i};
    //             $.post('get_photos.php', data, function(resp) {
    //                 var j = JSON.parse(resp);
    //                 $('#container').append(j['BODY']);
    //             });
    //             console.log('go');
    //         }
    //     // });
    // }, 2000);


    // $(window).scroll(function () {
    //     if ($(window).scrollTop() >= $(document).height() - $(window).height() - 10) {
    //         var data = {counter: i};
    //         $.post('get_photos.php', data, function(resp) {
    //             console.log(resp);
    //             var j = JSON.parse(resp);
    //             console.log(j['BODY']);
    //         });
    //     }
    // });
</script>
<script src="//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
</body>

<?php

?>