<?php
//$config = parse_ini_file(__DIR__ . '/../../var/secure/mp.ini', true);
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
      'authClientCollection' => [
              'class' => 'yii\authclient\Collection',
              'clients' => [
                  'facebook' => [
                      'class' => 'yii\authclient\clients\Facebook',
                      'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
                      'clientId' => '1859271527664686',
                      'clientSecret' => '6918910b0b8bc4f2bbc99e5715130b70',
                      'attributeNames' => ['name', 'email', 'first_name', 'last_name'],
                      //'returnUrl'=>'http://localhost/proyek1/frontend/login',
                  ],
                  /*'google' => [
                      'class' => 'yii\authclient\clients\Google',
                      'clientId' => '473413425160-vc2ceo8ls2h652dv6d9lepk9k761ltv9.apps.googleusercontent.com',
                      'clientSecret' => 'oyHiYW2pSkliRW8bQypItvVO',
                      'returnUrl'=>'http://localhost/proyek1/frontend/site/auth&authclient=google'
                    ],*/
                ],
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'formatter' => [
        'class' => 'yii\i18n\Formatter',
        'nullDisplay' => '-',
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
