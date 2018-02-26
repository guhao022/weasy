@extends('admin::adminlte.layouts.app')
@section('title', '新增菜单')

@section('content')

    <div class="row col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"> 新增菜单</h3>
                <div class="box-tools">
                    <div class="btn-group">
                        <a class="btn btn-sm btn-default history-back">
                            <i class="fa fa-arrow-left"></i>&nbsp;返回
                        </a>
                    </div>

                    <div class="btn-group">
                        <a href="{{ route('weasy.menu.index') }}" class="btn btn-sm btn-default">
                            <i class="fa fa-list"></i>&nbsp;列表
                        </a>
                    </div>
                </div>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('weasy.menu.create') }}">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-control">
                        <label for="name" class="col-sm-2 control-label">菜单名称</label>

                        <div class="col-sm-6">
                            <input type="name" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="例如：签到">
                            @if ($errors->has('name'))
                                <span class="help-block text-red">
                                    <p><i class="fa fa-info-circle"></i> {{ $errors->first('name') }}</p>
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
@section('scripts')

    <script type="text/javascript">



    </script>

@stop