<?php

namespace Modules\Weasy\Validation\Menus;

use Illuminate\Support\Facades\Request;
use Modules\Weasy\Validation\Validator;

class Create extends Validator
{

    public function rules()
    {

        if (Request::has('parent_id')) {
            return [
                'name' => 'required|max:4',
            ];
        } else {
            return [
                'name' => 'required|max:7',
            ];
        }

    }

    public function messages()
    {
        return [
            'name.required' => '菜单名称不能为空',
            'name.max'  => '菜单名称不能超过 :max 字',
        ];
    }
}
