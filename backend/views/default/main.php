<?php
/**
 * Created by PhpStorm.
 * User: 三杯虾
 * Date: 2018\4\5 0005
 * Time: 18:06
 */
use backend\assets\ManagerAsset;
use yii\helpers\Html;
use yii\helpers\Url;
ManagerAsset::register($this);
$this->title='后台管理系统';
?>
<?php $this->beginPage() ?>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="main" style="margin-left: -210px; margin-top: -52px;">
    <div class="mainwrap">
        <div class="main_cont">
            <div class="four-grids clearfix">
                <ul>
                    <li>
                        <div class="gridsbox gridsbox_1">
                            <div><i class="fa fa-sign-in"></i></div>
                            <h3>全部文章</h3>
                            <h4>0</h4>
                        </div>
                    </li>
                    <li>
                        <div class="gridsbox gridsbox_2">
                            <div><i class="fa fa-sign-out"></i></div>
                            <h3>今日发布</h3>
                            <h4>0</h4>
                        </div>
                    </li>
                    <li>
                        <div class="gridsbox gridsbox_3">
                            <div><i class="fa fa-history"></i></div>
                            <h3>今日待审核</h3>
                            <h4>0</h4>
                        </div>
                    </li>
                    <li>
                        <div class="gridsbox gridsbox_4">
                            <div><i class="fa fa-retweet"></i></div>
                            <h3>今日评论</h3>
                            <h4>20</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage() ?>