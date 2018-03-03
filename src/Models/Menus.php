<?php

namespace Modules\Weasy\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{

    public function __construct()
    {
        //
    }

    protected $table = "weasy_wx_menus";

    protected $hidden = ['created_at', 'deleted_at' , 'updated_at'];

    /**
     * 字段白名单.
     *
     * @var array
     */
    protected $fillable = [
        'account_id',
        'pid',
        'name',
        'type',
        'key',
        'sort',
    ];

    /**
     * 用于表单验证时的字段名称提示.
     *
     * @var array
     */
    public static $aliases = [
        'account_id' => '所属公众号',
        'pid' => '上级菜单',
        'name' => '菜单名称',
        'type' => '菜单类型',
        'key' => '菜单值',
        'sort' => '值',
    ];

    public function sub()
    {
        return $this->hasMany('Modules\Weasy\Models\Menus', 'pid');
    }

}
