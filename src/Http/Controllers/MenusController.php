<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/13
 * Time: 下午4:22
 */

namespace Modules\Weasy\Controllers;

use Modules\Weasy\Models\Menus;
use Modules\Weasy\Repositories\MenusRepository;
use Modules\Weasy\Validation\Menus\Create;

class MenusController extends Controller
{

    private $menuRepository;

    public function __construct(MenusRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    /**
     * @name 菜单列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        $account_id = account()->chosedId();

        $menus = Menus::where('account_id', $account_id)->get();

        $menus = tree($menus);

        return weasy_view('menus.index', ['menus'=>$menus]);
    }

    public function store(Create $request) {

        $input = $request->all();

        $input['account_id'] = account()->chosedId();

        $this->menuRepository->store($input);

        return redirect()->route('weasy.menu.index');
    }

    public function update($id) {

        //$this->menuRepository->
    }

    public function destroy() {
        //
    }

}