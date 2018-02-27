@extends('admin::adminlte.layouts.app')
@section('title', '微信公众号')

@section('content')
    <div class="row">

        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">公众号指数</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if(!account()->chosedId())

                        <div style="padding: 100px 0;position: relative;text-align: center;">
                            <p>未选择公众号</p>
                            <u><a href="{{ route('weasy.account.index') }}" class="text-aqua text-bold">点击前往选择公众号</a></u>
                        </div>

                    @endif
                </div>

            </div>

        </div>

        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">欢迎使用 微信管理 后台</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <h4>系统说明</h4>
                    <ul>
                        <li>现在的功能比较简单，会根据需求再完善</li>
                        <li>使用前修改smtp邮箱，否则一些需要发送邮件的地方会出现问题</li>
                        <li>可以修改配置文件中的NAME，系统的名字会对应改变</li>
                        <li>可以修改默认的管理员用户邮箱及名字，密码默认<code>123@123</code>，请自行修改</li>
                    </ul>
                    <hr>
                    <h4>系统已实现功能</h4>
                    <ul>
                        <li>自定义菜单，只包括点击事件和跳转链接</li>
                        <li>海报推广活动</li>
                    </ul>
                </div>

            </div>

        </div>

    </div>
@stop