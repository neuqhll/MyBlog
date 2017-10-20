<?php

/* @var $this yii\web\View */

use frontend\widgets\banner\BannerWidgets;
use frontend\widgets\post\PostWidgets;
use frontend\widgets\hot\HotWidget;
use frontend\widgets\tag\TagWidgets;
use frontend\widgets\Chat\ChatWidget;

$this->title = '学而时习之';
?>
<div class="site-index">
    <div class="row">
        <div class="col-lg-12">
            <!--            图片轮播-->
            <?=BannerWidgets::widget()?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <?=PostWidgets::widget()?>
        </div>
        <div class="col-lg-3">
            <!--            留言板-->
            <?=ChatWidget::widget()?>

            <br>
            <!--            热门文章-->
            <?=HotWidget::widget()?>
            <br>
            <!--            标签云-->
            <?=TagWidgets::widget()?>
        </div>
    </div>
</div>