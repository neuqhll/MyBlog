
<?php
use yii\helpers\Url;

?>
<div class="panel-title box-title" style="border-bottom:none">
    <span><strong>只言片语</strong></span>
    <span class="pull-right"><a href="feed/index" class="font-12">更多>></a></span>
</div>
<div class="pannel-boy">
    <form id="w0" action="/" method="post">
        <div class="form-group input-group field-feed-content required">
<textarea name="" id="feed-content" cols="30" rows="10" class="form-control" name="content">

</textarea>
<span class="input-group-btn">
<button type="button" data-url="<?=Url::to(['site/add-feed'])?>" class='btn btn-success btn-feed j-feed'>发布</button>
</span>
        </div>
    </form>
</div>

<?php if(!empty($data['feed'])):?>
    <ul class="media-list media-feed feed-index ps-container ps-active-y">
        <?php foreach($data['feed'] as $list):?>
<!--            <li class="media">-->
<!--                <div class="media-body" style="font-size: 12px;">-->
<!--                    <div class="media-content">-->
<!--                        --><?//=$list['user']['username']?><!--说:--><?//=$list['content']?>
<!--                    </div>-->
<!--                    <div class="media-action">-->
<!--                        --><?//=date('Y-m-d h:i:s',$list['created_at'])?>
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
            <div class="row">
            <li class="media">

                        <p>
                            <span class="glyphicon glyphicon-user"><?=$list['user']['username']?>&nbsp;&nbsp;</span>
                            <span class="glyphicon glyphicon-calendar"><?=date('Y-m-d',$list['created_at']);?>&nbsp;&nbsp;</span>
                        </p>
                <div class="jumbotron">
                        <p><?=$list['content']?></p>
                </div>
            </li>
            </div>


        <?php endforeach;?>
    </ul>

<?php endif;?>

