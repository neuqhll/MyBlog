<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use oonne\scrollTop\ScrollTop;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
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

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '学而时习之',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $leftMenus = [
        ['label' => '<span class="glyphicon glyphicon-home"</span>', 'url' => ['/site/index']],
        ['label' => '<span class="glyphicon glyphicon-list"</span>', 'url' => ['/post/index']],
        ['label' => '<span class="glyphicon glyphicon-edit"</span>', 'url' => ['/post/create']],
        ['label' => '后台管理', 'url' => 'http://www.backend.com'],
    ];

    if (Yii::$app->user->isGuest) {
        $rightMenus[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $rightMenus[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $rightMenus[] = [
            'label' => '<img src="/statics/images/avatar/logo1.jpg" class="img-circle" alt="'.Yii::$app->user->identity->username.'">',
            'url' => ['/site/logout'],
            'linkOptions' => ['class' => 'avatar'],
            //'linkOptions' => ['data-method' => 'post'],
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'encodeLabels' => false,
        'items' => $leftMenus,
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $rightMenus,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?= ScrollTop::widget(); ?>

<div class="friendly-link">
    <p>
        <span>友情链接: </span>
        <a href="http://www.neuqhll.top" TARGET="_blank" title="My Blog">学而时习之</a>|
        <a href="http://laravelacademy.org/" target="_blank" title="laravel学院">laravel学院</a>|
        <a href="http://www.getyii.com/" target="_blank" title="Get√Yii">Get√Yii</a>|
        <a href="http://www.phpxs.com/" target="_blank" title="PHP站中文网">PHP新手</a>|
        <a href="http://www.jsout.com/" target="_blank" title="前端汇">前端汇</a>|
        <a href="http://www.yuansir-web.com/" target="_blank" title="Yuansir-web菜鸟">Yuansir-web菜鸟</a>|
        <a href="http://www.5ibc.net/" target="_blank" title="PHP教程">PHP教程</a>|
        <a href="http://www.yiishop.com.cn" target="_blank" title="Yiishop">Yiishop</a>|
        <a href="http://www.yiifcms.com/" target="_blank" title="yiifcms">yiifcms</a>|
        <a href="http://www.fancyecommerce.com" target="_blank" title="yii2教程">yii2教程</a>|
        <a href="http://www.phpchina.com" target="_blank" title="PHPChina">PHPChina</a>|
        <a href="http://www.phpernote.com" target="_blank" title="php程序员的笔记">php程序员的笔记</a>
    </p>
</div>


<footer class="footer">
    <div class="container">
        <div class="class-center">
            <p _hover-ignore="1">
                <span>&copy; My Company <?= date('Y') ?></span>
                <a href="/" _hover-ignore="1">Blog</a>
                <span>All Rights Reserved. Theme By </span>
                <a href="www.yii-china.com">yii.</a>
            </p>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
