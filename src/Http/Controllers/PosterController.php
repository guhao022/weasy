<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/13
 * Time: 下午4:22
 */

namespace Modules\Weasy\Controllers;

use Modules\Weasy\Repositories\PosterRepository;

class PosterController extends Controller
{

    private $posterRepository;

    public function __construct(PosterRepository $posterRepository)
    {
        $this->posterRepository = $posterRepository;
    }

    /**
     * @name 海报列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        //
    }

    public function store() {

        //
    }

    public function destroy() {

        //
    }

}