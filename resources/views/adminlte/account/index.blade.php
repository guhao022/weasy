@extends('admin::adminlte.layouts.app')
@section('title', '公众号管理')

@section('content')
    <div class="row col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>

                <div class="pull-right">
                    <div class="form-inline pull-right">

                    </div>

                </div>

                <div class="btn-group">
                    <a href="{{ route('weasy.account.create') }}" class="btn btn-sm btn-success">
                        <i class="fa fa-save"></i>&nbsp;&nbsp;新增
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive ">
                <table class="table table-hover dataTable">
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
                            @if(admin_user()->can('weasy.account.update') || admin_user()->hasRole('admin'))
                                <a href="{{ route('weasy.account.update', $account->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endif
                            @if(admin_user()->can('weasy.account.destroy') || admin_user()->hasRole('admin'))
                                <a href="javascript:void(0);" data-id="{{$account->id}}" data-route="{{route('weasy.account.destroy')}}"class="grid-row-delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
@section('scripts')

    <script type="text/javascript">

        $('.grid-row-delete').unbind('click').click(function() {

            if(confirm("确认删除?")) {
                $.ajax({
                    method: 'post',
                    url: $(this).data('route'),
                    data: {
                        _method:'delete',
                        _token:WE.token,
                    },
                    success: function (data) {

                        if (typeof data === 'object') {
                            if (data.status) {
                                $('#tr_'+id).remove();
                                toastr.success(data.message);
                            } else {
                                toastr.error(data.message);
                            }
                        }
                    }
                });
            }
        });

    </script>

@stop