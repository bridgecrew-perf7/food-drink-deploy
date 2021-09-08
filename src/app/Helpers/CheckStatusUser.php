<?php
use App\Enums\Status;
    if (!function_exists('checkStatusUser')) {
        function checkStatusUser($status)
        {
            $html = "";
            $texts = ($status == Status::getValue('ACTIVE')) ? __('custom.Active') : __('custom.Blocked');
            $class = ($status == Status::getValue('ACTIVE')) ? 'badge badge-success text-wrap' : 'badge badge-danger text-wrap';
            $html .="<div class='".$class."' style='width: 6rem;'>".$texts."</div>";
            return $html;

        }
    }

