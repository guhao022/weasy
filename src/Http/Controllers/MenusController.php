<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/13
 * Time: 下午4:22
 */

namespace Modules\Weasy\Controllers;

use Illuminate\Http\Request;
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

        $menus = $this->menuRepository->lists($account_id);

        return weasy_view('menus.index', ['menus'=>$menus]);
    }

    public function store(Create $request) {

        $account_id = account()->chosedId();

        $this->menuRepository->destroyAll($account_id);

        $input = $request->menus;

        $this->menuRepository->storeMulti($account_id, $input);

        return response()->json(['status'=>true, 'message'=>'添加菜单成功']);
    }

    public function destroy(Request $request) {

        $ids = $request->ids;

        $delete =  Menus::destroy($ids);

        if ($delete) {
            return response()->json(['status'=>true, 'message'=>'删除成功']);
        } else {
            return response()->json(['status'=>false, 'message'=>'删除失败']);
        }
    }

}