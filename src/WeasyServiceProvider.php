<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/4
 * Time: 下午5:47
 */

namespace Modules\Weasy;

use Illuminate\Support\ServiceProvider;
use Modules\Weasy\Commands\WeasyCommand;

class WeasyServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 路由
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        // 数据库迁移
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // view
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'weasy');

        // 配置
        $this->publishes([
            __DIR__.'/../config/weasy.php' => config_path('weasy.php'),
        ], 'weasy');

        // 资源
        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('packages/weasy'),
        ], 'weasy');

        // 注册命令
        if ($this->app->runningInConsole()) {
            $this->commands([
                WeasyCommand::class,
            ]);
        }

        $this->loadHelper();

        //
    }

    protected function loadHelper()
    {
        require_once __DIR__.'/helper.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }



}