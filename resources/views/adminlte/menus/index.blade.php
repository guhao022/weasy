@extends('admin::adminlte.layouts.app')
@section('title', '自定义菜单')

@section('content')

    <style type="text/css">

        .menu-add-input button {
            margin: 10px 0 0 10px;
        }

        .menu-item-heading {
            position: relative;
            display: inline-block;
            padding: 10px 15px;
        }

        .menu-item-heading:hover {
            background: #f4f5f9
        }

        .menu-item-heading .actions {
            display: none;
        }

        .menu-item-heading:hover .actions {
            display:block;
            -webkit-transition:all .3s;
            -moz-transition:all .3s;
            transition:all .3s
        }

        .actions a {
            display: inline-block;
            padding: 0 5px;
            color: #666;
            font-size: 16px;
        }

        .current {
            background: transparent;
            color: #444;
            border-top: 0;
            border-left:3px solid #3c8dbc;
        }

        .spacious{
            padding: 100px 60px 120px;
            position: relative;
            text-align: center;
        }

    </style>

    <div class="col-lg-3 col-md-4 col-sm-4">

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">自定义菜单</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="add-menu btn btn-xs btn-info" data-toggle="modal" data-target="#modal-add-menu">
                        <i class="fa fa-plus"></i> &nbsp;添加
                    </button>
                </div>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-stacked menu-item">

                    @if(isset($menus))

                        <div class="menu spacious">
                            <p>尚未配置菜单</p>
                            <a href="javascript:;" data-toggle="modal" data-target="#modal-add-menu" class="add-menu text-green">点此立即创建</a>
                        </div>

                    @else

                        <li class="menu-item-heading">

                            <span class="menu-item-name">菜单</span>

                            <div class="actions pull-right">
                                <a href="javascript:;" class="edit" title="修改菜单"><i class="fa fa-edit"></i></a>
                                <a href="javascript:;" class="add-sub" title="新增子菜单"><i class="fa fa-plus-square-o"></i></a>
                                <a href="javascript:;" class="trash" title="删除菜单"><i class="fa fa-trash-o"></i></a>
                            </div>


                        </li>
                    @endif

                </ul>

            </div>

        </div>

    </div>

    {{--<div class="col-lg-8 col-md-6 col-sm-6">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">自定义菜单</h3>

                <div class="box-tools pull-right">

                </div>
            </div>
            <div class="box-body">

                <div class="emenu spacious">
                    <p>选择或创建一个菜单并设置响应内容</p>
                </div>

            </div>

        </div>

    </div>--}}





    <div class="modal fade" id="modal-add-menu">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">新增菜单</h4>
                </div>
                <form action="{{ route('weasy.menu.store') }}" method="post">
                    <div class="modal-body">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">菜单名称</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="字数不多于4个汉字或8个字母">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">关闭</button>
                        <button type="submit" class="btn btn-primary submit-o">提交</button>
                    </div>
                </form>

            </div>

        </div>
    </div>


@stop
@section('scripts')

    <script type="text/javascript">
        //
    </script>

@stop