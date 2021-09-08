<?php
    use Illuminate\Support\Carbon;

    if (!function_exists('getNewProduct')) {
        function getNewProduct($created_at)
        {
            $interval = $created_at->diffInDays(Carbon::now());
            if ($interval <= 5) {
                return "<img src='/images/new.png' class='new' alt='new'/>";
            }

        }
    }
