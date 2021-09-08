<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'confirmed' => 'Mật khẩu xác nhận không khớp.',
    'email' => 'Địa chỉ email là một địa chỉ email hợp lệ.',
    'max' => [
        'string' => 'Trường :attribute không được lớn hơn :max ký tự.',
    ],
    'required' => 'Trường :attribute bắt buộc phải nhập.',
    'unique' => 'Trường :attribute đã tồn tại.',
    'regex' => 'Trường :attribute không đúng định dạng.',
    'min' => [
        'string' => 'Trường :attribute phải có ít nhất :min kí tự tối thiểu.',
    ],
    'same' => 'Trường :attribute và :other phải khớp.',
    'current_password' => 'Mật khẩu hiện tại không đúng',
    'numeric' => 'Trường :attribute phải là số.',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
