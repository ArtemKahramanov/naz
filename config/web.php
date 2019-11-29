<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'Metall-SS',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'MOzeimiREdv4sO1j_9xG3OG0QNcBBzmu',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
//            'cachePath' => '@app/cache'
        ],
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => 'your siteKey',
            'secret' => 'your secret key',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'artemkahramanov1999@gmail.com',
                'password' => 'ogtwlgolhqeyblas',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'cart' => [
            'class' => 'devanych\cart\Cart',
            'storageClass' => 'devanych\cart\storage\SessionStorage',
            'calculatorClass' => 'devanych\cart\calculators\SimpleCalculator',
            'params' => [
                'key' => 'cart',
                'expire' => 604800,
                'productClass' => 'app\entities\Product',
                'productFieldId' => 'id',
                'productFieldPrice' => 'price',
            ],
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
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views/' => '@app/views/user'
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
    'modules' => [
        'admin-back' => [
            'class' => 'app\modules\adminBack\Module',
            'layout' => 'main'
        ],
        'contact' => [
            'class' => 'app\modules\contact\Module',
        ],
        'call' => [
            'class' => 'app\modules\call\Module',
        ],
        'treemanager' => [
            'class' => '\kartik\tree\Module',
            'treeViewSettings' => [
                'nodeView' => '@app/modules/adminBack/views/category/_form'
            ]
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'enableConfirmation' => false,
            'enableGeneratingPassword' => true,
            'enablePasswordRecovery' => false,
            'enableAccountDelete' => false,
            'enableRegistration' => true,
//            'admins' => ['Metall-admin-SS'],
            'admins' => ['admin'],
            'mailer' => [
                'sender'                => ['artemkahramanov1999@gmail.com' => 'Metall-SS'],
                'welcomeSubject'        => 'Ваш пароль на Metall-SS.ru',
            ],
        ],
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => '@webroot/img/text-pages',
            'uploadUrl' => '@web/img/text-pages',
            'imageAllowExtensions' => ['jpg', 'png', 'gif']
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
