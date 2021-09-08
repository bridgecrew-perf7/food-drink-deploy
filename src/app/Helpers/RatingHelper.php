<?php
    use App\Models\Evaluates;
    // Calculator Rating of Products.
    if (!function_exists('getRatingProduct')) {
        function getRatingProduct($product_id)
        {
            $stars = round(Evaluates::byProductId($product_id)->avg('rating'), 1);
            if ($stars != 0) {
              return $stars . "<i class='fa fa-star click-active' aria-hidden='true'></i>";
            }
            return __('custom.message_rating_no_data');
        }
    }
