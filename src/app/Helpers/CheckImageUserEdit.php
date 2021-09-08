<?php
    if (!function_exists('checkImageUserEdit')) {
        function checkImageUserEdit($image)
        {
            $src_image = $image ? $image : '/storage/photos/1/avatar/thumbs/user.jpg';
            $img = "<img src='".$src_image."'/>";
            return $img;
        }
    }

