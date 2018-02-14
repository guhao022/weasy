<?php

namespace Modules\Weasy\Repositories;

use Illuminate\Support\Facades\Session;
use Modules\Weasy\Models\Accounts;

/**
 * Account Repository.
 */
class AccountRepository
{
    use BaseRepository;

    /**
     * Account Model.
     *
     * @var Account
     */
    protected $model;

    public function __construct(Accounts $account)
    {
        $this->model = $account;
    }

    /**
     * 获取账户列表.
     *
     * @param int $pageSize 分页大小
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public function lists($pageSize)
    {
        return $this->model->orderBy('id', 'desc')->paginate($pageSize);
    }

    /**
     * store.
     *
     * @param array           $input
     */
    public function store($input)
    {
        return $this->savePost($this->model, $input);
    }

    /**
     * 根据tag获取公众号.
     *
     * @param string $tag tag
     *
     * @return Model
     */
    public function getByTag($tag)
    {
        return $this->model->where('tag', $tag)->first();
    }

    /**
     * update.
     *
     * @param int   $id
     * @param array $input
     */
    public function update($input, $id)
    {
        $model = $this->model->find($id);

        return $this->savePost($model, $input);
    }

    /**
     * save.
     *
     * @param Account $account account
     * @param Request $input   输入
     */
    public function savePost($account, $input)
    {
        $account->name = $input->name;
        $account->original_id = $input->original_id;
        $account->wechat_account = $input->wechat_account;
        $account->app_id = $input->app_id;
        $account->app_secret = $input->app_secret;
        $account->account_type = $input->account_type;

        return $account->save();
    }

    /**
     * 切换公众号.
     *
     * @param int $id id
     */
    public function change($id)
    {
        Session::put('account_id', $id);
    }
}
