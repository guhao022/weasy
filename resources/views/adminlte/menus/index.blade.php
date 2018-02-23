@extends('admin::adminlte.layouts.app')
@section('title', '自定义菜单')

@section('content')

    <div class="col-lg-3 col-md-4 col-sm-4">

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">自定义菜单</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="add-menu-item btn btn-sm btn-info">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">

                @if(isset($menus))

                    <div style="padding: 100px 60px 120px;position: relative;text-align: center;">
                        <p>尚未配置菜单</p>
                        <a href="javascript:;" class="add-menu-item text-green">点此立即创建</a>
                    </div>

                @else

                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox
                                <span class="label label-primary pull-right">12</span></a></li>
                        <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                        <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                        <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
                        </li>
                        <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                    </ul>

                @endif

            </div>

        </div>

    </div>


@stop
@section('scripts')


@stop