<?php
require_once("header.php");
?>
<body>
<div role="main" class="container center" id="container">
    <div class="photoset-grid-lightbox" style="visibility: hidden;">
        <?php

        $image_list = array();
        $files = glob('./i_low/*');

//        foreach ($files as $file) {
//            $image_list[filemtime($file)] = $file;
//        }
//        ksort($image_list);
//        $image_list = array_reverse($image_list, TRUE);


        $image_list = array_reverse($files, TRUE);


        $i = 0;
        foreach ($image_list as $image) {
            if ($i < 50) {
                $file_name = $image;
                $hi_res = str_replace('i_low/', 'i/', $image);
                $photo = '<img src="' . $file_name . '" data-highres="'.$hi_res.'">';
                echo $photo;
                $i++;
            } else {
                break;
            }
        }
        ?>

    </div>
</div>

<script>
    $('.photoset-grid-lightbox').photosetGrid({
        layout: '211222111112122222222223212211', //31212211121112312',
        width: '100%',
        gutter: '5px',
        highresLinks: true,
        rel: 'gallery-01',
        borderActive: false,

        onInit: function(){},
        onComplete: function(){
            $('.photoset-grid-lightbox').css({
                'visibility': 'visible'
            });
        }
    });
</script>
</body>

<?php

?>