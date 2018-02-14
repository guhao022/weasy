<?php

namespace Modules\Weasy\Validation\Accounts;

use Modules\Weasy\Validation\Validator;

class Create extends Validator
{

    public function rules()
    {
        return [
            'name'=>'required|unique:weasy_accounts',
            'original_id'=>'required|unique:weasy_accounts',
            'app_id'=>'required|unique:weasy_accounts',
            'app_secret'=>'required',
            'account_type'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '公众号名称不能为空',
            'name.unique'  => '公众号已经存在',
            'original_id.required' => '原始id不能为空',
            'original_id.unique'  => '原始id已经存在',
            'app_id.required' => 'AppId不能为空',
            'app_id.unique'  => 'AppId已经存在',
            'app_secret.required'  => 'AppSecret不能为空',
            'account_type.required'  => '请选择公众号类型',
        ];
    }
}
