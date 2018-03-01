<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/13
 * Time: 下午4:22
 */

namespace Modules\Weasy\Controllers;

use Modules\Weasy\Models\Accounts;

class HomeController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index() {

        $accounts = Accounts::all();

        return weasy_view('index', ['accounts'=>$accounts]);
    }

}