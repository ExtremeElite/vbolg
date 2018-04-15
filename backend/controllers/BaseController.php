<?php
/**
 * Created by PhpStorm.
 * User: 三杯虾
 * Date: 2018/2/14
 * Time: 9:26
 */

namespace backend\controllers;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
class BaseController extends Controller
{
    protected $login_actions=[];
    protected $except_actions=[];
    protected $verbs_actions=['logout' => ['get']];
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)){
            return true;
        }
        return false;

    }
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'user'=>'admin',
                'except'=>$this->except_actions,
                'rules' => [
                    [
                        'actions' => $this->login_actions,
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => $this->verbs_actions,
            ],
        ];
    }
}