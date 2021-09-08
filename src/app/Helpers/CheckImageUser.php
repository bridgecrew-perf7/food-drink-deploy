<?php
    if (!function_exists('checkImageUser')) {
        function checkImageUser()
        {
            if (Auth::user()->image)
            {
                return "<img src='".Auth::user()->image."'/>";
            }
            else{
                return "<img src='/storage/photos/2/avatar/thumbs/user.jpg'/>";
            }
        }
    }

