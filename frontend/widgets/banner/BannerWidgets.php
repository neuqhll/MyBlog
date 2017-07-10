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
                ['label' => 'demo', 'image_url' => '/statics/images/banner/b_0.jpeg', 'url' => ['site/index']],
                ['label' => 'demo', 'image_url' => '/statics/images/banner/b_1.jpeg', 'url' => ['site/index']],
                ['label' => 'demo', 'image_url' => '/statics/images/banner/b_2.jpeg', 'url' => ['site/index']],
            ];
        }
    }
    public function run()
    {
        $data['items'] = $this->item;
        return $this->render('index',['data'=>$data]);
    }
}