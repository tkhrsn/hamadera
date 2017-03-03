<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Utils\accessCntUtil;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * TOP画面表示
     * @return type
     */
    public function show()
    {
        $this->accessCnt = $this->_getAccessCnt();

        return view('welcome');
    }

    /**
     * アクセスカウント取得
     * @return type
     */
    private function _getAccessCnt()
    {
        $newCnt = accessCntUtil::getCnt() + 1;
        accessCntUtil::updateCnt($newCnt);

        return $newCnt;
    }
}
