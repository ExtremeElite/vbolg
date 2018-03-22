<?php
/**
 * Created by PhpStorm.
 * User: 三杯虾
 * Date: 2018/2/13
 * Time: 16:26
 */

namespace common\components;

use yii\base\BaseObject;
use Yii;
class CommonTools extends BaseObject
{
    const SRT_ARRY='abcdefghijklmnopqrstuvwxyz0123456789';
    private static $_strs='';
/*
 *  固定长度的字符串
 */
    public static function createStr($length=6){
        $length=intval(trim($length));
        if ($length<6){
            $length=6;
        }
        for($i=0;$i<$length;$i++){
            self::$_strs.=self::SRT_ARRY[mt_rand(0,strlen(self::SRT_ARRY)-1)];
        }
        return self::$_strs;
    }
}
