<?php
/**
 * Created by PhpStorm.
 * User: 三杯虾
 * Date: 2018\4\5 0005
 * Time: 18:38
 */

namespace backend\controllers;

use common\components\CommonTools;
class DefaultController extends BaseController
{
    protected $except_actions=['test'];
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }
    public function actionMain(){
        $this->layout="manager";
        return $this->render('main');
    }
    public function actionTest(){
//        $pic_url='http://mmbiz.qpic.cn/mmbiz_jpg/UibPQjicj2nM3jfsoZ87LSuiaLribQASHzXq7NYDspzoL0hAicXmCbB8za8ygVAibz2yn1jQqujiaxIKFP2nBaIKPt6jw/640?wx_fmt=jpeg';
//        $local_path=\Yii::getAlias('@localpath').'/'.date('Ymd',time());
//        $name='213.jpg';
//        $http_img_url=CommonTools::img_get($pic_url,$local_path,$name);
        var_dump(\Yii::getAlias('@domain'));

    }
}