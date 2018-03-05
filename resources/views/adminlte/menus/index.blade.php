@extends('admin::adminlte.layouts.app')
@section('title', '自定义菜单')

@section('content')
    <style>

        .mobile-preview .mobile-header{color:#fff;text-align:center;padding-top:30px;font-size:15px;width:auto;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;word-wrap:normal;margin:0 30px;-webkit-pointer-events:none;pointer-events:none;-webkit-user-select:none;-moz-user-select:none;user-select:none}
        .mobile-body{width:100%;position:absolute;bottom:0;top:60px;background-color: #FFF}
        .mobile-body iframe{width:100%;height:100%;background:#fff}
        .mobile-footer{list-style-type:none;margin:0;position:absolute;bottom:0;left:0;right:0;border-top:1px solid #e7e7eb;background:url("https://res.wx.qq.com/mpres/htmledition/images/bg/bg_mobile_foot_default3a7b38.png") no-repeat 0 0;padding-left:43px}
        .mobile-footer li{width:33.33%;line-height:44px;position:relative;float:left;text-align:center}
        .mobile-footer li a{display:block;border:1px solid rgba(255, 255, 255, 0);border-left:1px solid #e7e7eb;width:auto;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;word-wrap:normal;color:#616161;text-decoration:none}
        .mobile-footer li a.active{background-color:#fff;border:1px solid #44b549 !important}
        .mobile-footer .icon-add{background:url("https://res.wx.qq.com/mpres/zh_CN/htmledition/comm_htmledition/style/page/menu/index_z3a7b39.png") 0 0 no-repeat;width:14px;height:14px;vertical-align:middle;display:inline-block;margin-top:-2px;border-bottom:none !important}
        .mobile-footer .icon-sub{background:url("https://res.wx.qq.com/mpres/zh_CN/htmledition/comm_htmledition/style/page/menu/index_z3a7b39.png") 0 -36px no-repeat;width:7px;height:7px;vertical-align:middle;display:inline-block;margin-right:2px;margin-top:-2px}
        .mobile-footer .sub-menu{position:absolute;border-radius:3px;border:1px solid #d0d0d0;display:block;bottom:60px;width:100%;background-color:#fafafa}
        .mobile-footer .sub-menu ul,
        .mobile-footer .sub-menu li{padding:0;display:block;width:100%;float:none;z-index:11}
        .mobile-footer .sub-menu li a{border:1px solid rgba(255, 255, 255, 0)}
        .mobile-footer .sub-menu li a.bottom-border{border-bottom:1px solid #e7e7eb}
        .mobile-footer .arrow{position:absolute;left:50%;margin-left:-6px}
        .mobile-footer .arrow_in, .mobile-footer .arrow_out{z-index:10;width:0;height:0;display:inline-block;border-width:6px;border-style:dashed;border-color:transparent;border-bottom-width:0;border-top-style:solid}
        .mobile-footer .arrow_in{bottom:-5px;border-top-color:#fafafa}
        .mobile-footer .arrow_out{bottom:-6px;border-top-color:#d0d0d0}
        .mobile-preview {position: relative;width: 317px;height: 580px;background: url('https://res.wx.qq.com/mpres/htmledition/images/bg/bg_mobile_head_default3a7b38.png') no-repeat 0 0;border: 1px solid #e7e7eb;}
        .mobile-preview {-moz-user-select: none;-webkit-user-select: none;-ms-user-select: none;-khtml-user-select: none;user-select: none;}
        .menu-editor {left: 317px;display: block;max-width: 500px;width: 500px;height: 580px;border-radius: 0;border-color: #e7e7eb;box-shadow: none;z-index: 99}
        .menu-editor .arrow {top: auto !important;bottom: 15px}
        .menu-editor .popover-title {margin-top: 0}
        .menu-delete {font-weight: 400;font-size: 12px;}
        .menu-submit {margin-right: 10px}

    </style>


    <div class="md-menu" style="margin-left: 20%;">
        <div class="mobile-preview pull-left">
            <div class="mobile-header">{{ $current_account->name }}</div>
            <div class="mobile-body"></div>
            <ul class="mobile-footer">


                @foreach ($menus as $menu)
                <li class="parent-menu">
                    <a><i class="icon-sub hide"></i> <span data-type="{{$menu->type}}" data-key="{{$menu->key}}">{{$menu->name}}</span></a>
                    <div class="sub-menu text-center hide">
                        <ul>
                            @if(!empty($menu['sub']))
                            @foreach ($menu->sub as $submenu)
                            <li>
                                <a class="bottom-border"><span data-type="{{ $submenu->type }}" data-key="{{$submenu->key}}">{{$submenu->name}}</span></a>
                            </li>
                            @endforeach
                            @endif
                            <li class="menu-add"><a><i class="icon-add"></i></a></li>
                        </ul>
                        <i class="arrow arrow_out"></i>
                        <i class="arrow arrow_in"></i>
                    </div>
                </li>
                @endforeach




                <li class="parent-menu menu-add" style="width: 50%;">
                    <a><i class="icon-add"></i></a>
                </li>
            </ul>
        </div>

        <div class="pull-left" style="position:absolute">
            <div class="popover fade right up in menu-editor">
                <div class="arrow"></div>
                <h3 class="popover-title">
                    菜单名称

                    <a class="pull-right menu-delete">删除</a>

                </h3>
                <div class="popover-content menu-content"></div>
            </div>
        </div>


        <div class="hide menu-editor-parent-tpl">
            <form class="form-horizontal">
                <p>已添加子菜单，仅可设置菜单名称。</p>

                <div class="form-group" style="margin-top: 35px">
                    <label for="menu-name" class="col-sm-3 control-label">菜单名称</label>

                    <div class="col-sm-8">
                        <input type="text" name="menu-name" class="form-control" id="menu-name">
                        <p class="help-block">字数不超过5个汉字或16个字母。</p>
                    </div>
                </div>

            </form>
        </div>
        <div class="hide menu-editor-content-tpl form-horizontal">
            <form class="form-horizontal ">

                <div class="form-group" style="margin-top: 35px">
                    <label for="menu-name" class="col-sm-3 control-label">菜单名称</label>

                    <div class="col-sm-8">
                        <input type="text" name="menu-name" class="form-control" id="menu-name">
                        <p class="help-block">字数不超过13个汉字或40个字母。</p>
                    </div>
                </div>

                <div class="form-group" style="margin-top:30px">
                    <label class="col-sm-3 control-label">菜单内容</label>
                    <div class="col-sm-9">

                        <label class="col-sm-5 font-noraml">
                            <input class="" type="radio" name="type" value="event"> 事件功能
                        </label>

                        <label class="col-sm-5 ">
                            <input class="" type="radio" name="type" value="view"> 跳转网页
                        </label>

                        <label class="col-sm-5">
                            <input class="" type="radio" name="type" value="keys"> 关键字
                        </label>

                        <label class="col-sm-5">
                            <input class="" type="radio" name="type" value="miniprogram"> 小程序
                        </label>

                    </div>
                </div>

                <div class="form-group editor-content-input" style="margin-top:30px"></div>
            </form>
        </div>

        <div style="clear:both"></div>
        <div style="width:830px;padding-top:40px;text-align:center">
            <button class="btn btn-success menu-submit" >保存发布</button>
            <button data-load="" class="btn btn-danger">取消发布</button>
        </div>
    </div>


@stop
@section('scripts')

    <script type="text/javascript">
        $(function () {
            /**
             * 菜单事件构造方法
             * @returns {menu.index_L2.menu}
             */
            var menu = function () {
                this.version = '1.0';
                this.$btn;
                this.listen();
            };
            /**
             * 控件默认事件
             * @returns {undefined}
             */
            menu.prototype.listen = function () {
                var self = this;
                $('.mobile-footer').on('click', 'li a', function () {
                    self.$btn = $(this);
                    self.$btn.parent('li').hasClass('menu-add') ? self.add() : self.checkShow();
                }).find('li:first a:first').trigger('click');
                $('.menu-delete').on('click', function () {
                    if(confirm('确定删除吗？')) {
                        self.del();
                    };
                });
                $('.menu-submit').on('click', function () {
                    self.submit();
                });
            };
            /**
             * 添加一个菜单
             * @returns {undefined}
             */
            menu.prototype.add = function () {
                var $add = this.$btn.parent('li'), $ul = $add.parent('ul');
                if ($ul.hasClass('mobile-footer')) { /* 添加一级菜单 */
                    var $li = $('<li class="parent-menu"><a class="active"><i class="icon-sub hide"></i> <span>一级菜单</span></a></li>').insertBefore($add);
                    this.$btn = $li.find('a');
                    $('<div class="sub-menu text-center hide"><ul><li class="menu-add"><a><i class="icon-add"></i></a></li></ul><i class="arrow arrow_out"></i><i class="arrow arrow_in"></i></div>').appendTo($li);
                } else { /* 添加二级菜单 */
                    this.$btn = $('<li><a class="bottom-border"><span>二级菜单</span></a></li>').prependTo($ul).find('a');
                }
                this.checkShow();
            };
            /**
             * 数据校验显示
             * @returns {unresolved}
             */
            menu.prototype.checkShow = function () {
                var $li = this.$btn.parent('li'), $ul = $li.parent('ul');
                /* 选中一级菜单时显示二级菜单 */
                if ($li.hasClass('parent-menu')) {
                    $('.parent-menu .sub-menu').not(this.$btn.parent('li').find('.sub-menu').removeClass('hide')).addClass('hide');
                }

                /* 一级菜单添加按钮 */
                var $add = $('li.parent-menu:last');
                $add.siblings('li').length >= 3 ? $add.addClass('hide') : $add.removeClass('hide');
                /* 二级菜单添加按钮 */
                $add.siblings('li').map(function () {
                    var $add = $(this).find('ul li:last');
                    $add.siblings('li').length >= 5 ? $add.addClass('hide') : $add.removeClass('hide');
                });
                /* 处理一级菜单 */
                var parentWidth = 100 / $('li.parent-menu:visible').length + '%';
                $('li.parent-menu').map(function () {
                    var $icon = $(this).find('.icon-sub');
                    $(this).width(parentWidth).find('ul li').length > 1 ? $icon.removeClass('hide') : $icon.addClass('hide');
                });
                /* 更新选择中状态 */
                $('.mobile-footer a.active').not(this.$btn.addClass('active')).removeClass('active');
                this.renderEdit();
                return $ul;
            };
            /**
             * 删除当前菜单
             * @returns {undefined}
             */
            menu.prototype.del = function () {
                var $li = this.$btn.parent('li'), $ul = $li.parent('ul');
                var $default = function () {
                    if ($li.prev('li').length > 0) {
                        return $li.prev('li');
                    }
                    if ($li.next('li').length > 0 && !$li.next('li').hasClass('menu-add')) {
                        return $li.next('li');
                    }
                    if ($ul.parents('li.parent-menu').length > 0) {
                        return $ul.parents('li.parent-menu');
                    }
                    return $('null');
                }.call(this);
                $li.remove();
                this.$btn = $default.find('a:first');
                this.checkShow();
            };
            /**
             * 显示当前菜单的属性值
             * @returns {undefined}
             */
            menu.prototype.renderEdit = function () {
                var $span = this.$btn.find('span'), $li = this.$btn.parent('li'), $ul = $li.parent('ul');
                var $html = '';
                if ($li.find('ul li').length > 1) { /*父菜单*/
                    $html = $($('.menu-editor-parent-tpl').html());
                    $html.find('input[name="menu-name"]').val($span.text()).on('change keyup', function () {
                        $span.text(this.value || ' ');
                    });
                    $('.menu-editor .menu-content').html($html);
                } else {
                    $html = $($('.menu-editor-content-tpl').html());
                    $html.find('input[name="menu-name"]').val($span.text()).on('change keyup', function () {
                        $span.text(this.value || ' ');
                    });
                    $('.menu-editor .menu-content').html($html);
                    var type = $span.attr('data-type') || 'text';
                    $html.find('input[name="type"]').on('click', function () {
                        $span.attr('data-type', this.value || 'text');
                        var key = $span.data('key') || '';
                        var type = this.value;
                        var html = function () {
                            switch (type) {
                                case 'miniprogram':
                                    var tpl = '<div><div class="form-group"><label class="col-sm-3 control-label">appid</label><div class="col-sm-8"><input type="text" name="appid" required="" placeholder="appid" autocomplete="off" class="form-control" value=""></div></div><div class="form-group"><label class="col-sm-3 control-label">url</label><div class="col-sm-8"><input type="text" name="url" required=""  placeholder="url" autocomplete="off" class="form-control" value=""></div></div><div class="form-group"><label class="col-sm-3 control-label">pagepath</label><div class="col-sm-8"><input type="text" name="pagepath" required=""  placeholder="pagepath" autocomplete="off" class="form-control" value="{pagepath}"></div></div></div>';
                                    var _appid = '', _pagepath = '', _url = '';
                                    if (key.indexOf(',') > 0) {
                                        _appid = key.split(',')[0] || '';
                                        _url = key.split(',')[1] || '';
                                        _pagepath = key.split(',')[2] || '';
                                    }
                                    $span.data('appid', _appid), $span.data('url', _url), $span.data('pagepath', _pagepath);
                                    return tpl.replace('{appid}', _appid).replace('/mp/mp/menu.html', _url).replace('{pagepath}', _pagepath);
                                case 'customservice':
                                case 'text':
                                    return '<div class="form-group"><label class="col-sm-3 control-label">回复内容</label><div class="col-sm-8"><textarea style="resize:none;height:225px" name="key" class="form-control">{key}</textarea></div></div>'.replace('{key}', key);
                                case 'view':
                                    return '<div class="form-group"><label class="col-sm-3 control-label">跳转地址</label><div class="col-sm-8"><input placeholder="请输入网址" class="form-control" name="key" value="{key}"></div></div>'.replace('{key}', key);
                                case 'keys':
                                    return '<div class="form-group"><label class="col-sm-3 control-label">匹配内容</label><div class="col-sm-8"><textarea placeholder="请输入内容" rows="5" class="form-control" name="key"></textarea></div></div>'.replace('{key}', key);
                                case 'event':
                                    var options = {
                                        'scancode_push': '扫码推事件',
                                        'scancode_waitmsg': '扫码推事件且弹出“消息接收中”提示框',
                                        'pic_sysphoto': '弹出系统拍照发图',
                                        'pic_photo_or_album': '弹出拍照或者相册发图',
                                        'pic_weixin': '弹出微信相册发图器',
                                        'location_select': '弹出地理位置选择器'};
                                    var select = [], tpl = '<div class="form-group" style="margin-bottom: auto;"><label class="col-sm-3 control-label"></label><div><label><input name="key" type="radio" {checked} value="{value}"> {title}</label></div></div>';
                                    if (!(options[key] || false)) {
                                        key = 'scancode_push';
                                        $span.data('key', key);
                                    }
                                    for (var i in options) {
                                        select.push(tpl.replace('{value}', i).replace('{title}', options[i]).replace('{checked}', (i === key) ? 'checked' : ''));
                                    }
                                    return select.join('');
                            }
                        }.call(this);
                        var $html = $(html), $input = $html.find('input,textarea');
                        $input.on('change keyup click', function () {
                            // 将input值写入到span上
                            $span.data(this.name, $(this).val() || $(this).html());
                            // 如果是小程序，合并内容到span的content上
                            if (type === 'miniprogram') {
                                $span.data('key', $span.data('appid') + ',' + $span.data('url') + ',' + $span.data('pagepath'));
                            }
                        });
                        $('.editor-content-input').html($html);
                    }).filter('input[value="{type}"]'.replace('{type}', type)).trigger('click');
                }
            };
            /**
             * 提交数据
             * @returns {undefined}
             */
            menu.prototype.submit = function () {
                var data = [];
                function getdata($span) {
                    var menudata = {};
                    menudata.name = $span.text();
                    menudata.type = $span.attr('data-type');
                    menudata.key = $span.data('key') || '';
                    return menudata;
                }

                $('li.parent-menu').map(function (index, item) {
                    if (!$(item).hasClass('menu-add')) {
                        var menudata = getdata($(item).find('a:first span'));
                        menudata.sub = [];
                        menudata.sort = index;

                        $(item).find('.sub-menu ul li:not(.menu-add) span').map(function (ii, span) {
                            var submenudata = getdata($(span));
                            submenudata.sort = ii;
                            menudata.sub.push(submenudata);
                        });
                        data.push(menudata);

                    }
                });

                var data = (data == '')?'':data;

                $.ajax({
                    url: "{{ route('weasy.menu.store') }}",
                    type: "post",
                    data: {
                        _token: WE.token,
                        menus: data
                    },
                    success: function (res) {
                        if (typeof res === 'object') {
                            if (res.status) {
                                toastr.success(res.message);
                            } else {
                                toastr.error(res.message);
                            }
                        }
                    }
                }, 'json');

            };
            new menu();
        });




        $('.trash').unbind('click').click(function() {
            var id=$(this).data('id');
            if(confirm("确认删除?")) {
                $.ajax({
                    method: 'post',
                    url: '{{ route('weasy.menu.destroy') }}',
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