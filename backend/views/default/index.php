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
<?php $this->beginBody() ?>
<div class="header_wrap">
    <div class="header clearfix">
        <div class="logo fl">
        </div>
        <div class="fl headtit">
        </div>
        <div class="head_drop fr">
            <div class="login_com">文章管理系统：<?php
                if (!Yii::$app->admin->isGuest){
                    echo Yii::$app->admin->identity->uname;
                }
                ?></div>
            <div class="head_dropdown mr20">
                <i class="fa fa-bell-o" style="margin-right: 3px;"></i><span class="account">消息通知</span><em class="fa fa-angle-down"></em>
                <ul class="news">
                    <li>
                        <a>
<!--                            <div class="clearfix">-->
<!--                                <div class="newstit">您有一条新消息</div>-->
<!--                            </div>-->
<!--                            <p class="newscon" style="color:red;">您还需要签送1条订单</p>-->
                        </a>
                    </li>
                    <li>
                        <a>
                            <div class="clearfix">
                                <div class="newstit">您有一条新消息</div>
                            </div>
                            <p class="newscon" style="color:red;">您已签送了1条订单</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="head_dropdown">
                <span class="account">
                    欢迎您，<?php
                    if (!Yii::$app->admin->isGuest){
                        echo Yii::$app->admin->identity->uname;
                    }
                    ?>
                </span>
                <em class="fa fa-angle-down"></em>
                <ul>
                    <li>
                        <a href="" target="box" style="display:block;">个人信息</a>
                    </li>
                    <li>
                        <a id="lbtnExit" href="<?=Url::to(['site/logout'])?>" style="display:block; ">退出</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="leftside">
    <div class="sidenav ">
        <div class="userInfo clearfix">
            <div class="userHead">
                <a><img src="images/contact-img.png"> </a>
            </div>
            <div>
                <div class="username">
                    <a title="bjhytx">超级管理员</a>
                </div>
                <div class="userzw">
                    <?php
                    if (!Yii::$app->admin->isGuest){
                        echo Yii::$app->admin->identity->uname;
                    }
                    ?>
                </div>

            </div>
        </div>
        <ul class="sidelist">
            <li class="cur">
                <a href="<?=Url::to(['default/main'])?>" target="box"><i class="fa fa-home"></i><span>首页</span></a>
            </li>

            <li>
                <a><i class="fa fa-columns"></i><span>文章管理</span><em class="fa fa-angle-down"></em></a>
                <ol>
                    <li>
                        <a href="<?=Url::to(['article/index'])?>" target="box">文章列表</a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['article/edit'])?>" target="box">添加文章</a>
                    </li>
                </ol>
            </li>
            <li>
                <a href="category/index.html" target="box"><i class="fa fa-glass"></i><span>分类管理</span></a>
            <li>
                <a href="tags/index.html" target="box"><i class="fa fa-tags"></i><span>标签管理</span></a>
            </li>
            </li>
            <li>
                <a><i class="fa fa-location-arrow"></i><span>位置管理</span><em class="fa fa-angle-down"></em></a>
                <ol>
                    <li>
                        <a href="article/index.html" target="box">首页置顶</a>
                    </li>
                    <li>
                        <a href="article/add.html" target="box">频道置顶</a>
                    </li>
                </ol>
            </li>
            <li>
                <a href="" target="box"><i class="fa fa-user"></i><span>会员管理</span></a>
            </li>
            <li>
                <a><i class="fa fa-gavel"></i><span>系统设置</span><em class="fa fa-angle-down"></em></a>
                <ol>
                    <li>
                        <a href="" target="box">基本设置</a>
                    </li>
                    <li>
                        <a href="" target="box">支付方式</a>
                    </li>
                    <li>
                        <a href="" target="box">地区列表</a>
                    </li>
                    <li>
                        <a href="" target="box">配送方式</a>
                    </li>
                </ol>
            </li>

            <li>
                <a><i class="fa fa-database"></i><span>数据统计</span><em class="fa fa-angle-down"></em></a>
                <ol>
                    <li>
                        <a href="" target="box">会员统计</a>
                    </li>
                    <li>
                        <a href="" target="box">商家统计</a>
                    </li>
                    <li>
                        <a href="" target="box">商品统计</a>
                    </li>
                    <li>
                        <a href="" target="box">订单统计</a>
                    </li>
                    <li>
                        <a href="" target="box">销售统计</a>
                    </li>
                </ol>
            </li>
        </ul>
    </div>

</div>
<div id="main" class="main">
    <iframe src="<?=Url::to(['default/main'])?>" style="border: 0;" width="100%" height="100%" name="box"></iframe>
</div>
<?php $this->endBody()?>
<script type="text/javascript">
    layui.config({
        debug: true
    });
    layui.use(['layer'], function() {
        var layer = layui.layer;
        var $ = layui.jquery;
        $(document).on("click", ".sidelist li a", function(e) {
            if($(this).attr("href") != undefined) {
                $(".sidelist li").removeClass("cur");
                $(this).parent().addClass("cur");
                $(".headtit").html($(this).text());
            } else {
                if($(this).parent().children("ol").css("display") == "none") {
                    $(this).parent().children("ol").show();
                    $(this).parent().find("em").addClass("fa-angle-up");
                    $(this).parent().find("em").removeClass("fa-angle-down");
                } else {
                    $(this).parent().children("ol").hide();
                    $(this).parent().find("em").removeClass("fa-angle-up");
                    $(this).parent().find("em").addClass("fa-angle-down");
                }
                $(".sidelist li").siblings().removeClass("cur");
            }
        });
    })
</script>
</body>
</html>
<?php $this->endPage() ?>