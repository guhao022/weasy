<?php


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

