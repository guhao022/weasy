@extends('admin::adminlte.layouts.app')
@section('title', '自定义菜单')

@section('content')

    <style type="text/css">

        .menu-add-input {
            padding: 10px 15px;
        }

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
                    <button type="button" class="add-menu btn btn-sm btn-info">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-stacked menu-item">

                    @if(isset($menus))

                        <div class="menu spacious">
                            <p>尚未配置菜单</p>
                            <a href="javascript:;" class="add-menu text-green">点此立即创建</a>
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

    <div class="col-lg-8 col-md-6 col-sm-6">

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

    </div>


@stop
@section('scripts')

    <script type="text/javascript">

        $('.add-menu').click(function () {

            if ($('.menu-item-heading').length >= 3) {
                alert('最多可以创建三个一级菜单');
                return;
            }

            $('.menu-add-input').remove();
            $('.menu.spacious').hide();

            var item_html = '<div class="menu-add-input">';
            item_html += '<input type="text" minlength="1" maxlength="3" id="add_menu" class="form-control">';
            item_html += '<div class="pull-right">';
            item_html += '<button onclick="add_menu()" class="btn btn-info btn-xs btn-flat submit-o">保存</button>';
            item_html += '<button onclick="cancel_add()" class="btn btn-danger btn-xs btn-flat cancel-o">取消</button>';
            item_html += '</div><div class="clearfix"></div> </div>';

            $('.menu-item').append(item_html)
            $('#add_menu').focus()
        })

        function add_menu() {

            if ($('.menu-item-heading').length >= 3) {
                alert('最多可以创建三个一级菜单');
            }

            var name = $("#add_menu").val();

            var _menu_html = '<li class="menu-item-heading">';
            _menu_html += '<span class="menu-item-name">'+ name +'</span>';
            _menu_html += '<div class="actions pull-right">';
            _menu_html += '<a href="javascript:;" class="edit" title="修改菜单"><i class="fa fa-edit"></i></a>';
            _menu_html += '<a href="javascript:;" class="add-sub" title="新增子菜单"><i class="fa fa-plus-square-o"></i></a>';
            _menu_html += '<a href="javascript:;" class="trash" title="删除菜单"><i class="fa fa-trash-o"></i></a>';
            _menu_html += '</div> </li>';

            $('.menu-add-input').remove();
            $('.menu-item').append(_menu_html)

            /*$.ajax({
                type: 'POST',
                url: '',
                data: {
                    name: name
                },
                dataType:'json',
                success:function(data){
                    $('.menu-add-input').remove();
                },
            })*/
        }

        function cancel_add() {

            $('.menu-add-input').remove();

            var m_num = $('.menu-item-heading').length;

            if (m_num == 0) $('.menu.spacious').show();
        }

        $(function () {
            $('#add_menu').keyup(function () {
                if($('#add_menu').val().length > 3) {

                }
            })
        })


    </script>

@stop