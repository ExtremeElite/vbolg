<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\3\11 0011
 * Time: 22:36
 */

use backend\assets\LoginAsset;
use yii\helpers\Html;
LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="webstorm" />
    <meta name="author" content="三杯虾" />
    <?= Html::csrfMetaTags() ?>
    <title>登录</title>
    <?php $this->head() ?>
    <script>
        var oParent=window.parent.document.getElementById('main');
        if(oParent){
            parent.location.reload();
        }

    </script>
</head>
<body class="login-bg">
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
