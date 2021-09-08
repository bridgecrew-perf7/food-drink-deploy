<?php
use App\Enums\Status;
    if (!function_exists('checkStatusCategory')) {
        function checkStatusCategory($status,$id_category)
        {
            $categoryStatus = Status::getValue('ACTIVE');
            $class_btn = $status == $categoryStatus ? 'btn btn-warning' : 'btn btn-success';
            $data_target = $status == $categoryStatus ? '#modalHiddenCategory' : '#modalShowCategory';
            $class_tag_i = $status == $categoryStatus ? 'fa fa-toggle-off' : 'fa fa-toggle-on';
            $button = "<button class='".$class_btn."' data-toggle='modal' onclick='getCategoryById($id_category)' data-target='".$data_target."'>
            <i class='".$class_tag_i."'></i></button>";
            return $button;

        }
    }

