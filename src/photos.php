<?php
require_once("header.php");
?>
<body>
    <div role="main" class="container center" id="container">
        <div class="row">
            <div id="photo-container" class="col-md-12 gal">
            </div>
        </div>
    </div>
    <script src="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>

    <script>
        data = {};
        $.get('get_imgs.php', data, function(resp) {
            var j = JSON.parse(resp);
            $('#photo-container').append(j.photos);
        });
    </script>
</body>