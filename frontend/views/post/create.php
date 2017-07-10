<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\redactor\widgets\Redactor;

$this->params['breadcrumbs'][]='创建';

?>

<div class="row">
    <div class="col-lg-9">
        <div class="panel-title box-title">
            <span>创建文章</span>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>
            <?=$form->field($model,'title')->textInput(['maxlength'=>true])?>
            <?=$form->field($model,'cat_id')->dropDownList($cat)?>


            <!--       Redactor editor     -->
                <?= $form->field($model, 'content')->widget(Redactor::className(), [
                    'clientOptions' => [
                        'imageManagerJson' => ['/redactor/upload/image-json'],
                        'imageUpload' => ['/redactor/upload/image'],
                        'fileUpload' => ['/redactor/upload/file'],
                        'lang' => 'zh_cn',
                        'plugins' => ['clips', 'fontcolor','imagemanager']
                    ]
                ])?>
            <?=$form->field($model,'tags')->widget('common\widgets\tags\TagWidget')?>
            <div class="form-group">
                <?=Html::submitButton("发布",['class'=>'btn btn-success'])?>
                <?=Html::resetButton("重置",['class'=>'btn btn-success'])?>
            </div>
            <?php ActiveForm::end()?>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="panel-title box-title">
            <span>注意事项</span>
        </div>
        <div class="panel-body">
            <p>one..</p>
            <p>two..</p>
        </div>
    </div>
</div>

