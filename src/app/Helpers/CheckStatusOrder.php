<?php
use App\Enums\StatusOrder;
    if (!function_exists('checkStatusOrder')) {
        function checkStatusOrder($status)
        {
            $content = "";
            $text = ($status == StatusOrder::getValue('UNCONFIMRED')) ? __('custom.Unconfimred') :
            (($status == StatusOrder::getValue('CONFIRMED')) ? __('custom.Confirmed') : __('custom.Cancelled'));
            $class = ($status == StatusOrder::getValue('UNCONFIMRED')) ? 'success' :
            (($status == StatusOrder::getValue('CONFIRMED')) ? 'primary' : 'danger');

            $content .= "<div class='badge badge-".$class." text-wrap' style='width: 6rem;'>".$text."</div>";

            return $content;
        }
    }

