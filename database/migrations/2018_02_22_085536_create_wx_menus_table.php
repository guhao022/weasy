<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weasy_wx_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->comment('所属公众号');
            $table->integer('pid')->nullable()->default(0)->comment('菜单父id');
            $table->string('name', 30)->comment('菜单名称');
            $table->enum('type', [
                'click',
                'view',
                'scancode_push',
                'scancode_waitmsg',
                'pic_sysphoto',
                'pic_photo_or_album',
                'pic_weixin',
                'location_select',
            ])->default('click')->comment('菜单类型');
            $table->string('key', 200)->nullable()->comment('菜单触发值');
            $table->tinyInteger('sort')->nullable()->default(0)->comment('排序');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weasy_wx_menus');
    }
}
