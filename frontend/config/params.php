<?php
return [
    'adminEmail' => 'admin@example.com',

    'modules' => [
        'redactor' => 'yii\redactor\RedactorModule',
        'user' => [
            // here is the config for user
        ],
    ],

    'default_label_img' => '/statics/image/label/d_0.jpg',

    'webuploader' => [
        // 后端处理图片的地址，value 是相对的地址
        'uploadUrl' => 'blog/upload',
        // 多文件分隔符
        'delimiter' => ',',
        // 基本配置
        'baseConfig' => [
            'defaultImage' => 'http://img1.imgtn.bdimg.com/it/u=2056478505,162569476&fm=26&gp=0.jpg',
            'disableGlobalDnd' => true,
            'accept' => [
                'title' => 'Images',
                'extensions' => 'gif,jpg,jpeg,bmp,png',
                'mimeTypes' => 'image/*',
            ],
            'pick' => [
                'multiple' => false,
            ],
        ],
    ],

];
