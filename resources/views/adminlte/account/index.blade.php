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
                            <a href="{{ route('weasy.account.chose', $account->id) }}" class="btn btn-info btn-xs btn-flat">切换公众号</a>
                            @if(admin_user()->can('weasy.account.update') || admin_user()->hasRole('admin'))
                                <a href="{{ route('weasy.account.update', $account->id) }}" class="btn btn-default btn-xs btn-flat">编辑</a>
                            @endif
                            <a href="#api_{{ $account->id }}" class="btn btn-success btn-xs btn-flat" data-toggle="modal">接口</a>
                            @if(admin_user()->can('weasy.account.destroy') || admin_user()->hasRole('admin'))
                                <a href="javascript:void(0);" class="grid-row-delete btn btn-danger btn-xs btn-flat" data-id="{{$account->id}}" data-route="{{route('weasy.account.destroy')}}">删除</a>
                            @endif
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
            </div>
        </div>
    </div>







@stop
@section('scripts')

    <script type="text/javascript">

        $('.grid-row-delete').unbind('click').click(function() {
            var id=$(this).data('id');
            if(confirm("确认删除?")) {
                $.ajax({
                    method: 'post',
                    url: $(this).data('route'),
                    data: {
                        ids: id,
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