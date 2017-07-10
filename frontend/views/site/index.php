<?php

/* @var $this yii\web\View */

use frontend\widgets\banner\BannerWidgets;
use frontend\widgets\post\PostWidgets;
use frontend\widgets\hot\HotWidget;
use frontend\widgets\tag\TagWidgets;

$this->title = 'Blog';
?>
<div class="site-index">
    <div class="row">
        <div class="col-lg-9">
<!--            图片轮播-->
            <?=BannerWidgets::widget()?>
        </div>
        <div class="col-lg-3">
            <!--            热门文章-->
            <?=HotWidget::widget()?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <?=PostWidgets::widget()?>
        </div>
        <div class="col-lg-3">
            <br>
<!--            标签云-->
            <?=TagWidgets::widget()?>
        </div>
    </div>
</div>