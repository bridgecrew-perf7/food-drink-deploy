<?php
use Carbon\Carbon;
use App\Enums\Status;

if (!function_exists('displayStar')) {
    function displayStar()
    {
        $htmlStar = '';
        for($i = 1; $i < 6; $i++) {
            $htmlStar .= "<i class=\"fa fa-star product-star-rating\" id=\"starRating$i\" aria-hidden=\"true\"></i>&nbsp;";
        }
        return $htmlStar;
    }
}

if (!function_exists('displayStatusOrder')) {
    function displayStatusOrder($status)
    {
        if ($status === \App\Enums\Status::BLOCK) {
            return "<span class='label label-warning'>" . __('custom.message_order_processing') . "</span>";
        }
        if ($status === \App\Enums\Status::CANCEL) {
            return "<span class='label label-danger'>" . __('custom.message_order_status_cancel') . "</span>";
        }
        return "<span class='label label-success'>" . __('custom.message_order_success') . "</span>";
    }

    if (!function_exists('displayCancelOrder')) {
        function displayCancelOrder($created_at, $orderId, $status)
        {
            # Calculate current date with creation date
            $interval = $created_at->diffInDays(Carbon::now());
            $htmlFormCancelOrder = "";
            if ($interval === 0 && $status === Status::BLOCK) {
                $htmlFormCancelOrder .= "<form action='" . route('order-cancel')
                    . "' id='formCancelOrder' method='post'>";
                $htmlFormCancelOrder .= csrf_field();
                $htmlFormCancelOrder .= "<input type='hidden' name='orderId' value='$orderId'>";
                $htmlFormCancelOrder .= "<button type='submit' class='btn btn-danger'>"
                    . __('custom.order_cancel') . "</button>";
                $htmlFormCancelOrder .= "</form>";
            }
            return $htmlFormCancelOrder;
        }
    }
}
