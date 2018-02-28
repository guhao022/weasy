<?php

namespace Modules\Weasy\Repositories;

use Modules\Weasy\Models\Menus;

/**
 * Account Repository.
 */
class MenusRepository
{
    use BaseRepository;

    /**
     * @var Menus
     */
    protected $menus;

    /**
     * @var EventRepository
     */
    protected $eventRepository;

    /**
     * @var MaterialRepository
     */
    protected $materialRepository;

    public function __construct(Menus $menus, EventRepository $eventRepository, MaterialRepository $materialRepository)
    {
        $this->menus = $menus;
    }

    /**
     * 菜单列表.
     *
     * @return array
     */
    public function lists($accountId)
    {
        return $this->model->with('subButtons')->where('account_id', $accountId)->where('parent_id', 0)->orderBy('id', 'asc')->get();
    }

    /**
     * 取得所有菜单 不带有层级.
     *
     * @return array
     */
    public function all($accountId)
    {
        return $this->model->where('account_id', $accountId)->get()->toArray();
    }

    /**
     * 一次存储所有菜单.
     *
     * @param int   $$accountId id
     * @param array $menus      菜单
     */
    public function storeMulti($accountId, $menus)
    {
        foreach ($menus as $key => $menu) {
            $menu['sort'] = $key;
            $menu['account_id'] = $accountId;

            $parentId = $this->store($menu)->id;

            if (!empty($menu['sub_button'])) {
                foreach ($menu['sub_button'] as $subKey => $subMenu) {
                    $subMenu['parent_id'] = $parentId;

                    $subMenu['sort'] = $subKey;

                    $subMenu['account_id'] = $accountId;

                    $this->store($subMenu);
                }
            }
        }
    }

    /**
     * 保存菜单.
     *
     * @param array $input input
     */
    public function store($input)
    {
        return $this->savePost(new $this->menus(), $input);
    }

    /**
     * savePost.
     *
     * @param \Modules\Weasy\Models\Menus $menu  菜单
     * @param array           $input input
     *
     * @return \Modules\Weasy\Models\Menus
     */
    public function savePost($menu, $input)
    {
        $menu->fill($input);

        $menu->save();

        return $menu;
    }


}
