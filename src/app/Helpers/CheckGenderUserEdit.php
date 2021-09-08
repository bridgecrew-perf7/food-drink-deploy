<?php
use App\Enums\Gender;
    if (!function_exists('checkGenderUserEdit')) {
        function checkGenderUserEdit($gender)
        {
            $options = ($gender == Gender::getValue('MALE')) ?
            "<option value='1' selected>".__('custom.Male')."</option><option value='0'>".__('custom.Female')."</option>" :
            "<option value='1'>".__('custom.Male')."</option><option value='0' selected>".__('custom.Female')."</option>";
            return $options;
        }
    }

