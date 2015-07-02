<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
           // set target language to be Russian
    'language' => 'zh-CN',
    //'language' => 'en-US',
    //Yii::$app->language = 'zh-CN',
    
    // set source language to be English
    'sourceLanguage' => 'en-US',

    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'frontend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
                'backend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
            ],
        ],
    ],
];
