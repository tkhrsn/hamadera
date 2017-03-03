<?php

namespace App\Utils;

use DB;

class accessCntUtil
{
    const TBL_KVS = 'key_value_stores';

    /**
     * アクセスカウントをkvsテーブルから取得する
     * @return type
     */
    public static function getCnt()
    {
        $rslt = DB::table(self::TBL_KVS)->select('name')->where('id', Consts::KVS_ACS_CNT_ID)->first();
        return intval($rslt->name);
    }

    /**
     * アクセスカウントを更新する
     * @param type $cnt
     * @return type
     */
    public static function updateCnt($cnt)
    {
        return DB::table(self::TBL_KVS)->where('id', Consts::KVS_ACS_CNT_ID)->update(['name' => $cnt]);
    }
}
