<?php

namespace App\Utils;

class calcUtil
{
    /**
     * 素数かどうかを判定する
     * @param type $int
     * @return boolean
     */
    public static function isPrime($int)
    {
        // 3以下の場合
        if (!ctype_digit($int)) {
            return false;
        }
        if ($int <= 0) {
            return false;
        }
        if ($int <= 3) {
            return true;
        }

        // でかすぎるの怖いからやめて
        if (10000 < $int) {
            return false;
        }

        // 4以上で偶数ならfalse
        if (($int % 2) === 0) {
            return false;
        }

        // 割り切れた時点でフェイク
        for ($i = 2; $i < $int; $i++) {
            if (($int % $i) === 0) {
                return false;
            }
        }

        return true;
    }
}
