<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

//$this->params['breadcrumbs'][]=['label' => '文章'];
////$this->params['breadcrumbs'][]=['label' => '创建','url'=>['post/create']];

?>

<div class="panel">
    <div class="panel-title box-title">
        <span><?=$data['title']?></span>
        <?php if($this->context->more):?>

        <?php endif;?>
    </div>
    <div class="new-list">
        <?php foreach ($data['body'] as $list): ?>
            <div class="panel-body border-bottom">
                <div class="col-lg-12 btn-group">
                    <div class="jumbotron well">

                        <div class="row">
                            <div class="page-title">
                                <h1><a href="<?= Url::to(['post/view', 'id' => $list['id']]) ?>"><?= $list['title'] ?></a></h1>
                            </div>
                        <span class="post-tags">
                        <span class="glyphicon glyphicon-user"></span>
                            <a href="<?= Url::to(['member/index', 'id' => $list['user_id']]) ?>"><?= $list['user_name'] ?></a>&nbsp;&nbsp;&nbsp;
                        <span class="glyphicon glyphicon-time"></span>
                            <?= date('Y-m-d', $list['created_at']) ?>&nbsp;&nbsp;&nbsp;
                        <span class="glyphicon glyphicon-eye-open"></span>
                            <?= isset($list['extend']['browser']) ? $list['extend']['browser'] : 0 ?>&nbsp;&nbsp;&nbsp;
                        <span class="glyphicon glyphicon-comment"></span>
                            <a href="<?= Url::to(['post/detail', 'id' => $list['id']]) ?>"><?= isset($list['extend']['comment']) ? $list['extend']['comment'] : 0 ?></a>
                        </span>

                            <p class="post-content"><?= $list['summary'] ?></p>

                        </div>
                        <div class="tags">
                            <?php if (!empty($list['tags'])): ?>
                                <span class="glyphicon glyphicon-tags"></span>&nbsp;
                                <?php foreach ($list['tags'] as $lt): ?>
                                    <a href="#"><?= $lt ?></a>&nbsp;
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <a href="<?= Url::to(['post/view', 'id' => $list['id']]) ?>">
                            <button class="btn btn-link btn-xs  ">Read More</button>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if ($this->context->page): ?>
        <div class="page"><?= LinkPager::widget(['pagination' => $data['page']]); ?></div>
    <?php endif; ?>
</div>