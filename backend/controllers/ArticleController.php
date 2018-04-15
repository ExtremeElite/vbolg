<?php
/**
 * Created by PhpStorm.
 * User: 三杯虾
 * Date: 2018\4\5 0005
 * Time: 15:31
 */

namespace backend\controllers;
use Yii;

class ArticleController extends BaseController
{
    public $layout='manager';
    public function actionIndex(){
       return $this->render('index');
    }
    public function actionAdd(){
        return $this->render('edit');
    }
    public function actionEdit(){
        if(Yii::$app->request->isPost){

        }
        return $this->render('edit');
        if (!empty($id)){
            $id=trim($id);
            return $this->render('edit');
        }


    }
}