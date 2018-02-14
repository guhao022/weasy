<?php

namespace Modules\Weasy\Observers;

use Modules\Weasy\Models\Accounts;

/**
 * Account模型观察者.
 *
 */
class AccountObserver
{
    /**
     * 保存事件.
     *
     * @param Account $account account
     */
    public function saving(Accounts $account)
    {
        $account->token = account()->buildToken();

        $account->aes_key = account()->buildAesKey();

        $account->tag = account()->buildTag();
    }

    /**
     * 创建事件.
     *
     * @param Account $account account
     */
    public function created(Accounts $account)
    {
        //同步图片
        //Queue::push(new SyncImageMaterial($account));
        //同步声音
        //Queue::push(new SyncVoiceMaterial($account));
        //同步视频
        //Queue::push(new SyncVideoMaterial($account));
        //同步图文
        //Queue::push(new SyncNewsMaterial($account));
        //同步菜单
        //Queue::push(new SyncMenus($account));
    }
}
