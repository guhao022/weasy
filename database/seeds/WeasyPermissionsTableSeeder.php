<?php

namespace Modules\Weasy\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeasyPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            [
                'id'=>1000,
                'name'=>'weasy.home',
                'display_name'=>'微信',
                'icon' => 'fa-weixin',
                'is_menu' => '1',
                'group_name'=>'weasy',
                'mod_name' => 'weasy',
                'pid'=>0
            ],
            [
                'id'=>1001,
                'name'=>'weasy.account',
                'display_name'=>'公众号',
                'icon' => 'fa-weixin',
                'is_menu' => '1',
                'group_name'=>'account',
                'mod_name' => 'weasy',
                'pid'=>1000
            ],
            [
                'id'=>1002,
                'name'=>'weasy.account.index',
                'display_name'=>'公众号管理',
                'icon' => 'fa-weixin',
                'is_menu' => '1',
                'group_name'=>'account',
                'mod_name' => 'weasy',
                'pid'=>1001
            ],
            [
                'id'=>1003,
                'name'=>'weasy.account.create',
                'display_name'=>'新增公众号',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'account',
                'mod_name' => 'weasy',
                'pid'=>1002
            ],
            [
                'id'=>1004,
                'name'=>'weasy.account.update',
                'display_name'=>'更新公众号',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'account',
                'mod_name' => 'weasy',
                'pid'=>1002
            ],
            [
                'id'=>1005,
                'name'=>'weasy.account.destroy',
                'display_name'=>'删除公众号',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'account',
                'mod_name' => 'weasy',
                'pid'=>1002
            ],
            [
                'id'=>1006,
                'name'=>'weasy.func',
                'display_name'=>'微信功能',
                'icon' => 'fa-th',
                'is_menu' => '1',
                'group_name'=>'func',
                'mod_name' => 'weasy',
                'pid'=>1000
            ],
            [
                'id'=>1007,
                'name'=>'weasy.menu.index',
                'display_name'=>'自定义菜单',
                'icon' => '',
                'is_menu' => '1',
                'group_name'=>'func',
                'mod_name' => 'weasy',
                'pid'=>1006
            ],
            [
                'id'=>1008,
                'name'=>'weasy.menu.store',
                'display_name'=>'新建菜单',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'func',
                'mod_name' => 'weasy',
                'pid'=>1007
            ],
            [
                'id'=>1009,
                'name'=>'weasy.menu.destroy',
                'display_name'=>'删除菜单',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'func',
                'mod_name' => 'weasy',
                'pid'=>1007
            ],
            [
                'id'=>1010,
                'name'=>'weasy.material.index',
                'display_name'=>'素材管理',
                'icon' => '',
                'is_menu' => '1',
                'group_name'=>'func',
                'mod_name' => 'weasy',
                'pid'=>1006
            ],
            [
                'id'=>1011,
                'name'=>'weasy.material.sync',
                'display_name'=>'素材同步',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'func',
                'mod_name' => 'weasy',
                'pid'=>1010
            ],
        ];

        foreach($permissions as $permission){
            DB::table('admin_permissions')->insert([
                'id'=>$permission['id'],
                'name'=>$permission['name'],
                'display_name'=>$permission['display_name'],
                'icon'=>$permission['icon'],
                'is_menu'=>$permission['is_menu'],
                'group_name'=>$permission['group_name'],
                'mod_name'=>$permission['mod_name'],
                'pid'=>$permission['pid']
            ]);
        }

    }
}
