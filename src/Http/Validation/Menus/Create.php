<?php

namespace Modules\Weasy\Validation\Menus;

use Illuminate\Support\Facades\Request;
use Modules\Weasy\Validation\Validator;

class Create extends Validator
{

    public function rules()
    {

        return [
            'menus' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'menus.required' => '菜单数据不能为空',
        ];
    }
}
