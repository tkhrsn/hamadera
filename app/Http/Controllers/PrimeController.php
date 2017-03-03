<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Utils\calcUtil;

class PrimeController extends Controller
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
    public function show($int)
    {
        $ret = [];

        $ret['isPrime'] = calcUtil::isPrime($int);

        return view('prime', $ret);
    }
}
