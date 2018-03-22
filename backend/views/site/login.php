<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="row-fluid login-wrapper ">
    <div class="span4 box ">
        <div class="content-wrap ">
            <h6>后台管理系统</h6>
            <?php $form=ActiveForm::begin(['id'=>'login-form'])?>
                <div class="span12 field-loginform-username required " placeholder="请输入用户名或邮箱 ">
                    <?=$form->field($model,'username')->textInput(['id'=>'loginform-username','class'=>"form-control",'autofocus' => true])?>
                </div>
                <div class="span12 field-loginform-password required " placeholder="请输入登录密码 ">

                    <?= $form->field($model,'password')->passwordInput(['id'=>'loginform-password','class'=>"form-control",'autofocus' => true])?>
                </div>
                <?= Html::submitButton('登录',['class'=>'btn-glow primary login','name'=>'login-button'])?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>