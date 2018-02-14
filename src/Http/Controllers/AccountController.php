<?php

namespace Modules\Weasy\Controllers;

use Modules\Weasy\Models\Accounts;

class AccountController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    // 公众号列表
    public function index() {
        $accounts = Accounts::all();

        return weasy_view('account.index', ['accounts' => $accounts]);
    }

    // 添加公众号
    public function create() {
        return weasy_view('account.create');
    }

    // 保存公众号
    public function store() {
        //
    }

    // 修改公众号信息
    public function edit($id) {
        //
    }

    // 更新公众号信息
    public function update($id) {
        //
    }

    // 删除公众号
    public function destroy() {
        //
    }

}