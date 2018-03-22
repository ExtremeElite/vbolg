<?php
namespace backend\controllers;

use backend\models\Admin;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;
use yii\web\NotFoundHttpException;
use common\components\CommonTools;
/**
 * Site controller
 */
class SiteController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'user'=>'admin',
                'rules' => [
                    [
                        'actions' => ['login','error','test'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionTest(){
        $str=CommonTools::createStr(10);
        echo $str;
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout='login';
        if (!Yii::$app->admin->isGuest){
            return $this->redirect(['site/index']);
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())&& $model->login()) {
            $id=trim(Yii::$app->admin->identity->id);
            $_admin=Admin::findOne($id);
            $_admin->last_time=time();
            $_admin->ip=Yii::$app->request->userIP;
            $_admin->update();
            return $this->redirect(['site/index']);
        } else {
            return $this->render('login',[
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->admin->logout();

        return $this->goHome();
    }
}
