<?php

/**
 * get tree
 *
 * @param $table
 * @param string $pid
 * @return array
 */
function tree($table, $pid='0') {
    $tree = array();
    foreach($table as $row){
        if($row['pid']==$pid){
            $tmp = tree($table,$row['id']);
            if($tmp){
                $row['children']=$tmp;
            }else{
                $row['leaf'] = true;
            }
            $tree[]=$row;
        }
    }
    return $tree;
}

if (! function_exists('weasy_view')) {
    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string  $view
     * @param  array   $data
     * @param  array   $mergeData
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    function weasy_view($view = null, $data = [], $mergeData = [])
    {
        return view('weasy::' . config('admin.theme') . '.' . $view, $data, $mergeData);
    }
}

if (! function_exists('account')) {
    /**
     * 返回当前公众号.
     *
     * @return mixed
     */
    function account()
    {
        return app('weasy.account_service');
    }
}

if (!function_exists('make_api_url'))
{
    /**
     * @param $tag
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function make_api_url($tag)
    {
        return url('/api?t='.$tag);
    }
}
