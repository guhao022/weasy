<?php

namespace Modules\Weasy\Models;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{

    public function __construct()
    {
        //
    }

    protected $table = "weasy_accounts";

    /**
     * 字段白名单.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'original_id',
        'wechat_account',
        'app_id',
        'app_secret',
        'account_type',
    ];

    /**
     * 用于表单验证时的字段名称提示.
     *
     * @var array
     */
    public static $aliases = [
        'name' => '公众号名称',
        'original_id' => '原始ID',
        'wechat_account' => '微信账号',
        'app_id' => '应用ID',
        'app_secret' => '应用secret',
        'account_type' => '账户类型',
    ];


}
