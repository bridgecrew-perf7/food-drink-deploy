<?php
use App\Enums\Status;
if (!function_exists('checkStatusTag')) {
    function checkStatusTag($status)
    {
        $status_active = Status::getValue('ACTIVE');
        $class_tag_p = $status == $status_active ? 'text-primary' : 'text-danger';
        $test = $status == $status_active ? __('custom.Show') : __('custom.Hidden');
        $content = "<p class='".$class_tag_p."'>".$test."</p>";
        return $content;
    }
}

if (!function_exists('checkStatusTagButton')) {
    function checkStatusTagButton($status,$id_tag)
    {
        $status_active = Status::getValue('ACTIVE');
        $class_btn = $status == $status_active ? 'btn btn-warning' : 'btn btn-success';
        $data_target = $status == $status_active ? '#modalHiddenTag' : '#modalShowTag';
        $class_tag_i = $status == $status_active ? 'fa fa-toggle-off' : 'fa fa-toggle-on';
        $button = "<button class='".$class_btn."' data-toggle='modal' onclick='getTagById($id_tag)' data-target='".$data_target."'>
        <i class='".$class_tag_i."'></i></button>";
        return $button;
    }
}