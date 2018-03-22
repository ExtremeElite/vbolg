<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'defaultRoute'=>'site',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf',
        ],
        'user' => [
            'identityClass' =>'common\models\User',
            'enableAutoLogin' => true,
            'idParam'=>'__user',
            'identityCookie'=>['name'=>'app-user'],
            'identityCookie' => ['name' => 'app_user', 'httpOnly' => true],
        ],
        /*
         * Admin Component
         */
        'admin' => [
            'class'=>'yii\web\User',
            'identityClass' =>'backend\models\Admin',
            'enableAutoLogin' => true,
            'idParam'=>'__admin',
            'identityCookie' => ['name' => 'app_admin', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'app_Tree',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
