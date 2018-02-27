<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/13
 * Time: 下午4:23
 */

namespace Modules\Weasy\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Weasy\Models\Accounts;

class Controller extends BaseController
{
    use /*AuthorizesRequests, DispatchesJobs,*/ ValidatesRequests;

    public function __construct() {
        //
    }
}