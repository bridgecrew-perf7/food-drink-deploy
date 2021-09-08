<?php
use App\Enums\Status;
    if (!function_exists('checkStatusProduct')) {
        function checkStatusProduct($status,$id_product)
        {
            $categoryProduct = Status::getValue('ACTIVE');
            $class_btn = $status == $categoryProduct ? 'btn btn-warning' : 'btn btn-success';
            $data_target = $status == $categoryProduct ? '#modalHiddenProduct' : '#modalShowProduct';
            $class_tag_i = $status == $categoryProduct ? 'fa fa-toggle-off' : 'fa fa-toggle-on';
            $button = "<button class='".$class_btn."' data-toggle='modal' onclick='getProductById($id_product)' data-target='".$data_target."'>
            <i class='".$class_tag_i."'></i></button>";
            return $button;
        }
    }

