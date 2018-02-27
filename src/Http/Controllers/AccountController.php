<?php

namespace Modules\Weasy\Controllers;

use Illuminate\Http\Request;
use Modules\Weasy\Models\Accounts;
use Modules\Weasy\Repositories\AccountRepository;
use Modules\Weasy\Validation\Accounts\Create;
use Modules\Weasy\Validation\Accounts\Update;

class AccountController extends Controller {

    protected $account;

    public function __construct(AccountRepository $accountRepository)
    {
        parent::__construct();

        $this->account = $accountRepository;
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
    public function store(Create $request) {

        $this->account->store($request);

        return redirect(route('weasy.account.index'))->with('message', '新增公众号 成功');

    }

    // 修改公众号信息
    public function edit($id) {

        $account = Accounts::find($id);

        return weasy_view('account.edit', ['account' => $account]);
    }

    // 更新公众号信息
    public function update(Update $request, $id) {
        $this->account->update($request, $id);

        return redirect(route('weasy.account.index'));
    }

    // 删除公众号
    public function destroy(Request $request) {

        $ids = $request->ids;

        $delete =  Accounts::destroy($ids);

        if ($delete) {
            return response()->json(['status'=>true, 'message'=>'删除成功']);
        } else {
            return response()->json(['status'=>false, 'message'=>'删除失败']);
        }
    }

    // 切换公众号
    public function chose($id) {
        account()->chose($id);
        return redirect()->route('weasy.home')->with('success', '切换公众号成功');
    }

}