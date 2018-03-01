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


                        <table class="table table-hover table-striped text-center">
                            <thead class="thead">
                            <tr>
                                <th>公众号名称</th>
                                <th>微信号</th>
                                <th>类型</th>
                                <th>添加时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($accounts as $account)
                                <tr id="tr_{{$account->id}}">
                                    <td>{{$account->name}}</td>
                                    <td>{{$account->wechat_account}}</td>
                                    <td>
                                        @if($account->account_type == 1)
                                            <span class="label label-success">订阅号</span>
                                        @elseif($account->account_type == 2)
                                            <span class="label label-primary">服务号</span>
                                        @endif

                                    </td>
                                    <td>{{$account->created_at}}</td>

                                    <td>
                                        <a href="{{ route('weasy.account.chose', $account->id) }}" class="btn btn-info btn-xs btn-flat">选择公众号</a>

                                        <a href="#api_{{ $account->id }}" class="btn btn-success btn-xs btn-flat" data-toggle="modal">接口</a>

                                    </td>

                                </tr>



                                <div class="modal fade" id="api_{{ $account->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">
                                                    <i class="fa fa-check-circle-o text-orange"></i>
                                                    <b>请复制此处token和url到公众平台绑定</b>
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Url:</strong>&nbsp;&nbsp;&nbsp;{{ make_api_url($account->tag) }}</p>
                                                <p><strong>Token:</strong>&nbsp;&nbsp;&nbsp;{{ $account->token }}</p>
                                                <p><strong>EncodingAESKey:</strong>&nbsp;&nbsp;&nbsp;{{ $account->aes_key }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" data-dismiss="modal">确 定</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>

                        {{--<div style="padding: 100px 0;position: relative;text-align: center;">
                            <p>未选择公众号</p>
                            <u><a href="{{ route('weasy.account.index') }}" class="text-aqua text-bold">点击前往选择公众号</a></u>
                        </div>--}}

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