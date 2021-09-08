<?php
use App\Enums\Status;
    if (!function_exists('statusProduct')) {
        function statusProduct($status)
        {
            $statusProduct = Status::getValue('ACTIVE');
            $class_tag_p = $status == $statusProduct ? 'text-primary' : 'text-danger';
            $test = $status == $statusProduct ? __('custom.Show') : __('custom.Hidden');
            $content = "<p class='".$class_tag_p."'>".$test."</p>";
            return $content;
        }
    }

