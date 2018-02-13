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
                'group_name'=>'wechat',
                'pid'=>0
            ],
            [
                'id'=>1001,
                'name'=>'weasy.mp',
                'display_name'=>'公众号',
                'icon' => 'fa-weixin',
                'is_menu' => '1',
                'group_name'=>'wxmp',
                'pid'=>1000
            ],
            [
                'id'=>1002,
                'name'=>'weasy.mp.index',
                'display_name'=>'公众号管理',
                'icon' => 'fa-weixin',
                'is_menu' => '1',
                'group_name'=>'wxmp',
                'pid'=>1001
            ],
            [
                'id'=>1003,
                'name'=>'weasy.mp.create',
                'display_name'=>'新增公众号',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'wxmp',
                'pid'=>1002
            ],
            [
                'id'=>1004,
                'name'=>'weasy.mp.update',
                'display_name'=>'更新公众号',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'wxmp',
                'pid'=>1002
            ],
            [
                'id'=>1005,
                'name'=>'weasy.mp.destroy',
                'display_name'=>'删除公众号',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'wxmp',
                'pid'=>1002
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
                'pid'=>$permission['pid']
            ]);
        }

    }
}
