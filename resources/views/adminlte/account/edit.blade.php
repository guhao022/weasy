@extends('admin::adminlte.layouts.app')
@section('title', '更新公众号')

@section('content')

    <div class="row col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"> 更新公众号</h3>
                <div class="box-tools">
                    <div class="btn-group">
                        <a class="btn btn-sm btn-default history-back">
                            <i class="fa fa-arrow-left"></i>&nbsp;返回
                        </a>
                    </div>

                    <div class="btn-group">
                        <a href="{{ route('weasy.account.index') }}" class="btn btn-sm btn-default">
                            <i class="fa fa-list"></i>&nbsp;列表
                        </a>
                    </div>
                </div>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('weasy.account.update', $account->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">公众号名称</label>

                        <div class="col-sm-6">
                            <input type="name" name="name" class="form-control" id="name" value="{{ $account->name }}" placeholder="例如：weasy">
                            @if ($errors->has('name'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('name') }}</p>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group ">
                        <label for="original_id" class="col-sm-2 control-label">公众号原始Id</label>
                        <div class="col-sm-6">
                            <input class="form-control" value="{{ $account->original_id }}" placeholder="请认真填写，错了不能修改。例如gh_gks84hksi90o" name="original_id" type="text" id="original_id" />
                            @if ($errors->has('original_id'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('original_id') }}</p>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="wechat_account" class="col-sm-2 control-label">微信号</label>
                        <div class="col-sm-6">
                            <input class="form-control" value="{{ $account->wechat_account }}" placeholder="例如：weasy" name="wechat_account" type="text" id="wechat_account" />
                            @if ($errors->has('wechat_account'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('wechat_account') }}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="app_id" class="col-sm-2 control-label">AppID（公众号）</label>
                        <div class="col-sm-6">
                            <input class="form-control" value="{{ $account->app_id }}" placeholder="用于自定义菜单等高级功能" name="app_id" type="text" id="app_id" />
                            @if ($errors->has('app_id'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('app_id') }}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="app_secret" class="col-sm-2 control-label">AppSecret </label>
                        <div class="col-sm-6">
                            <input class="form-control" value="{{ $account->app_secret }}" placeholder="用于自定义菜单等高级功能" name="app_secret" type="text" id="app_secret" />
                            @if ($errors->has('app_secret'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('app_secret') }}</p>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="account_type" class="col-sm-2 control-label">微信号类型 </label>
                        <div class="col-sm-6">
                            <select class="form-control bs-select-hidden" placeholder="认证服务号是指每年向微信官方交300元认证费的公众号" id="account_type" name="account_type">
                                <option value="1" @if( $account->account_type == 1) selected @endif>订阅号</option>
                                <option value="2" @if( $account->account_type == 2) selected @endif>服务号</option>
                            </select>

                            @if ($errors->has('account_type'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('account_type') }}</p>
                                </span>
                            @endif

                        </div>
                    </div>

                </div>

                <div class="box-footer">
                    <div class="col-sm-offset-2 col-md-6">
                        <button type="reset" class="btn btn-warning">重置</button>
                        <button type="submit" class="btn btn-info pull-right">提交</button>
                    </div>

                </div>

            </form>

        </div>
    </div>

@stop

