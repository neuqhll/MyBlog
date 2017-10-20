<?php

namespace frontend\widgets\banner;

use kartik\base\Widget;
use yii;

class BannerWidgets extends Widget
{
    public $item = [];

    public function init()
    {
        if(empty($this->item)) {
            $this->item = [
                ['label' => 'demo', 'image_url' => '/statics/images/banner/bg_0.jpg', 'url' => ['site/index']],
                ['label' => 'demo', 'image_url' => '/statics/images/banner/bg_1.jpg', 'url' => ['site/index']],
                ['label' => 'demo', 'image_url' => '/statics/images/banner/bg_2.jpg', 'url' => ['site/index']],
                ['label' => 'demo', 'image_url' => '/statics/images/banner/bg_3.jpg', 'url' => ['site/index']],
                ['label' => 'demo', 'image_url' => '/statics/images/banner/bg_4.jpg', 'url' => ['site/index']],
                ['label' => 'demo', 'image_url' => '/statics/images/banner/bg_5.jpg', 'url' => ['site/index']],
                ['label' => 'demo', 'image_url' => '/statics/images/banner/bg_6.jpg', 'url' => ['site/index']],
                ['label' => 'demo', 'image_url' => '/statics/images/banner/bg_7.jpg', 'url' => ['site/index']],
                ['label' => 'demo', 'image_url' => '/statics/images/banner/bg_8.jpg', 'url' => ['site/index']],
            ];
        }
    }
    public function run()
    {
        $data['items'] = $this->item;
        return $this->render('index',['data'=>$data]);
    }
}