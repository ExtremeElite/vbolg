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
    public static function versionCSS(){
        return '?v=20180405';
    }
    public static function versionJs(){
        return '?v=20180405';
    }
    /*
     * 下载图片 同步下载本地
     */
    public static function img_get($url,$local_path,$name){
        $image_url=Yii::getAlias('@image');
        $domain=Yii::getAlias('@domain');
        if(strpos($url,$domain)===false){
            $res=self::curl_get($url);
            self::save_img($local_path,$name,$res);
            $http_img_url=$image_url.'/'.date('Ymd',time()).'/'.$name;
            return $http_img_url;
        }
    }
    public static function curl_get($url){
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }
    public static function save_img($local_path,$name,$res){
        if(!is_dir($local_path)){
            mkdir($local_path);
            file_put_contents($local_path.'/'.$name,$res);
        }
        file_put_contents($local_path.'/'.$name,$res);
    }
}
