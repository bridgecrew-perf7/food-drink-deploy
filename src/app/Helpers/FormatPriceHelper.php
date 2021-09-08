<?php
if (!function_exists('formatPrice')) {
    function formatPrice($price)
    {
        $strPrice = str_replace(',', '', $price);
        return number_format((float)$strPrice, 0, ',', '.') . 'đ';
    }
}

if (!function_exists('formatNumberPhone')) {
    function formatNumberPhone($phone)
    {
        if (empty($phone)) {
            return "";
        }
        return '+84' . $phone;
    }
}
