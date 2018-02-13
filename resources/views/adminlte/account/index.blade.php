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

                {{--<div class="btn-group">
                    <a href="{{ route('weasy.mp.create') }}" class="btn btn-sm btn-success">
                        <i class="fa fa-save"></i>&nbsp;&nbsp;新增
                    </a>
                </div>--}}
            </div>
            <div class="box-body table-responsive ">
                <table class="table table-hover dataTable" data-nosort="1,6">
                    <thead class="thead">
                    <tr>
                        <td>公众号名称</td>
                        <td>微信号</td>
                        <td>类型</td>
                        <td>添加时间</td>
                        <td>操作</td>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($accounts as $account)
                    <tr id="tr_{{$account->name}}">
                        <td>{{$account->wechat_account}}</td>
                        <td>{{$account->email}}</td>
                        <td>{{$admin->name}}</td>
                        <td>
                            @if(admin_user()->can('weasy.account.update') || admin_user()->hasRole('admin'))
                                <a href="{{ route('admin.edit', $admin->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void(0);" data-id="{{$admin->id}}" data-route="{{route('admin.destroy', $admin->id)}}"class="grid-row-delete">
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

        $('.dataTable').dataTable( {

            "oLanguage": {
                "sLengthMenu": "每页显示 _MENU_ 条记录",
                "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                "sInfoEmpty": "没有数据",
                "sSearch": "搜索:",
                "sInfoFiltered": "(从 _MAX_ 条数据中检索)",
                "sLoadingRecords": "载入中...",
                "oPaginate": {
                    "sFirst": "首页",
                    "sPrevious": "前一页",
                    "sNext": "后一页",
                    "sLast": "尾页"
                },
                "sZeroRecords": "没有检索到数据",
            },
            "aLengthMenu": [[20, 50, 100, -1], [20, 50, 100, "所有"]],
            "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 5 ] }]
        } );

        $('.grid-row-delete').unbind('click').click(function() {
            var id=$(this).data('id');
            if (id == 1) {
                alert('初始管理员不能删除');
            }
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