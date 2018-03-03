<?php

namespace Modules\Weasy\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Modules\Weasy\Repositories\AccountRepository;

/**
 * 后台视图组织.
 *
 * @author guhao <378999587@qq.com>
 */
class AccountComposer
{
    private $request;

    private $accountRepository;

    public function __construct(Request $request, AccountRepository $accountRepository)
    {
        $this->request = $request;

        $this->accountRepository = $accountRepository;
    }

    /**
     * compose.
     *
     * @param View $view 视图对象
     */
    public function compose(View $view)
    {
        $current = account()->getCurrent();

        if(!$current) {
            return redirect()->route('weasy.account.index')->with('error', '请选择公众号');
        }

        $view->with(['current_account' => $current]);


    }
}
