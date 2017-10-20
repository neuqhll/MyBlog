<?php

$this->title = $data['title'];
$this->params['breadcrumbs'][]= $this->title;
?>

<div class="row">
    <div class="col-lg-9">
        <div class="page-title">
            <h1><?=$data['title']?></h1>
            <span class="glyphicon glyphicon-user"><?=$data['user_name']?>&nbsp;&nbsp;</span>
            <span class="glyphicon glyphicon-calendar"><?=date('Y-m-d',$data['created_at']);?>&nbsp;&nbsp;</span>
            <span class="glyphicon glyphicon-eye-open"><?=isset($data['extend']['browser'])?$data['extend']['browser']:0?></span>
        </div>

    <div class="page-content">
        <?=$data['content']?>
    </div>

    <div class="page-img">
        <?=$data['label_img']?>
    </div>

    <div class="page-tag">
            <span class="glyphicon glyphicon-tags">&nbsp;&nbsp;</span>
            <?php foreach($data['tags'] as $tag):?>
                <span><a href="#"><?=$tag?></a> </span>
            <?php endforeach;?>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
