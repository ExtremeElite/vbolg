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
    protected $login_actions=['logout','index'];
    protected $except_actions=['login','error'];
    /**
     * Displays homepage.
     *
     * @return string
     */
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
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())&& $model->login()) {
            $id=trim(Yii::$app->admin->identity->id);
            $_admin=Admin::findOne($id);
            $_admin->last_time=time();
            $_admin->ip=Yii::$app->request->userIP;
            $_admin->update();
            return $this->goHome();
            #return $this->redirect(['defualt/index']);
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
    public function actionError(){
        return '404';
    }
}
