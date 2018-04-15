<?php
/**
 * Created by PhpStorm.
 * User: 三杯虾
 * Date: 2018\4\5 0005
 * Time: 17:15
 */

namespace backend\assets;
use yii\web\AssetBundle;
use common\components\CommonTools;

class ManagerAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public function init()
    {
        parent::init();
        foreach ($this->css as &$c){
            $c=$c.CommonTools::versionCSS();
        }
        foreach ($this->js as &$j){
            $j=$j.CommonTools::versionJs();
        }
    }

    public $css = [
        'css/layui.css',
        'css/base.css',
        'css/global.css',
        'css/font-awesome.css',
        'css/theme.css',
        'css/index.css',
    ];
    public $js = [
        'layui.js',
        'baidu/ueditor.config.js',
        'baidu/ueditor.all.min.js',
        'baidu/lang/zh-cn/zh-cn.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions=[
        'position'=>\yii\web\View::POS_HEAD,
    ];
}