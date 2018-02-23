<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/13
 * Time: 下午4:22
 */

namespace Modules\Weasy\Controllers;

class MenusController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index() {

        return weasy_view('index');
    }

}