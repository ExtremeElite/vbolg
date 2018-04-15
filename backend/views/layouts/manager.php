<?php
/**
 * Created by PhpStorm.
 * User: 三杯虾
 * Date: 2018\4\5 0005
 * Time: 18:07
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
<?php $this->beginBody()?>
<?= $content ?>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
